<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Verset;
use Illuminate\Http\Request;

class VersetController extends Controller
{
    public function index()
    {
        $versets = Verset::orderBy('jour_index')->paginate(30);
        return view('admin.versets.index', compact('versets'));
    }

    public function create()
    {
        return view('admin.versets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jour_index' => 'required|integer|min:1|max:365|unique:versets,jour_index',
            'reference' => 'required|string|max:100',
            'texte' => 'required|string',
        ]);

        Verset::create($validated);

        return redirect()->route('admin.versets.index')
            ->with('success', 'Verset créé avec succès.');
    }

    public function show(Verset $verset)
    {
        return view('admin.versets.show', compact('verset'));
    }

    public function edit(Verset $verset)
    {
        return view('admin.versets.edit', compact('verset'));
    }

    public function update(Request $request, Verset $verset)
    {
        $validated = $request->validate([
            'jour_index' => 'required|integer|min:1|max:365|unique:versets,jour_index,' . $verset->id,
            'reference' => 'required|string|max:100',
            'texte' => 'required|string',
        ]);

        $verset->update($validated);

        return redirect()->route('admin.versets.index')
            ->with('success', 'Verset mis à jour avec succès.');
    }

    public function destroy(Verset $verset)
    {
        $verset->delete();

        return redirect()->route('admin.versets.index')
            ->with('success', 'Verset supprimé avec succès.');
    }
}
