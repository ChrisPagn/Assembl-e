<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:pages,slug|max:255',
            'titre' => 'required|string|max:255',
            'contenu_html' => 'nullable|string',
            'visible_au_menu' => 'nullable|boolean',
            'ordre_menu' => 'nullable|integer|min:0',
            'parent_id' => [
                'nullable',
                'exists:pages,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        // Vérifier que le parent choisi n'a pas déjà un parent (limite à 2 niveaux)
                        $parent = Page::find($value);
                        if ($parent && $parent->parent_id !== null) {
                            $fail('Impossible de créer un sous-menu de niveau 3. Veuillez sélectionner un menu principal.');
                        }
                    }
                }
            ],
            'menu_titre' => 'nullable|string|max:255',
        ]);

        // Convertir la checkbox en boolean
        $validated['visible_au_menu'] = $request->has('visible_au_menu');

        // Forcer l'ordre à 0 minimum
        if (isset($validated['ordre_menu']) && $validated['ordre_menu'] < 0) {
            $validated['ordre_menu'] = 0;
        }

        // Nettoyer le HTML avec Purifier pour éviter les XSS
        if (!empty($validated['contenu_html'])) {
            $validated['contenu_html'] = Purifier::clean($validated['contenu_html'], [
                'HTML.Allowed' => 'p,br,strong,em,u,b,i,h1,h2,h3,h4,h5,h6,ul,ol,li,a[href|title|target],img[src|alt|width|height|class],div[class],span[class],blockquote,code,pre',
                'CSS.AllowedProperties' => '',
            ]);
        }

        Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page créée avec succès.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'titre' => 'required|string|max:255',
            'contenu_html' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'info_culte' => 'nullable|string',
            'info_adresse' => 'nullable|string',
            'info_message' => 'nullable|string',
            'visible_au_menu' => 'nullable|boolean',
            'ordre_menu' => 'nullable|integer|min:0',
            'parent_id' => [
                'nullable',
                'exists:pages,id',
                function ($attribute, $value, $fail) use ($page) {
                    if ($value) {
                        // Ne pas être son propre parent
                        if ($value == $page->id) {
                            $fail('Une page ne peut pas être son propre parent.');
                        }

                        // Vérifier que le parent choisi n'a pas déjà un parent (limite à 2 niveaux)
                        $parent = Page::find($value);
                        if ($parent && $parent->parent_id !== null) {
                            $fail('Impossible de créer un sous-menu de niveau 3. Veuillez sélectionner un menu principal.');
                        }

                        // Éviter les boucles : le parent ne doit pas avoir cette page comme parent
                        if ($parent && $parent->parent_id == $page->id) {
                            $fail('Cette sélection créerait une boucle dans la hiérarchie des menus.');
                        }
                    }
                }
            ],
            'menu_titre' => 'nullable|string|max:255',
        ]);

        // Convertir la checkbox en boolean
        $validated['visible_au_menu'] = $request->has('visible_au_menu');

        // Forcer l'ordre à 0 minimum
        if (isset($validated['ordre_menu']) && $validated['ordre_menu'] < 0) {
            $validated['ordre_menu'] = 0;
        }

        // Nettoyer le HTML avec Purifier pour éviter les XSS
        if (!empty($validated['contenu_html'])) {
            $validated['contenu_html'] = Purifier::clean($validated['contenu_html'], [
                'HTML.Allowed' => 'p,br,strong,em,u,b,i,h1,h2,h3,h4,h5,h6,ul,ol,li,a[href|title|target],img[src|alt|width|height|class],div[class],span[class],blockquote,code,pre',
                'CSS.AllowedProperties' => '',
            ]);
        }

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page mise à jour avec succès.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page supprimée avec succès.');
    }
}
