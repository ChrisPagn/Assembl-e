<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
{
    public function index()
    {
        $timeline = TimelineEvent::orderBy('ordre')->get();
        return view('admin.timeline.index', compact('timeline'));
    }

    public function create()
    {
        return view('admin.timeline.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'annee' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ordre' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('timeline', 'public');
        }

        TimelineEvent::create($validated);

        return redirect()->route('admin.timeline.index')
            ->with('success', 'Événement de la timeline créé avec succès.');
    }

    public function show(TimelineEvent $timeline)
    {
        return view('admin.timeline.show', compact('timeline'));
    }

    public function edit(TimelineEvent $timeline)
    {
        return view('admin.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, TimelineEvent $timeline)
    {
        $validated = $request->validate([
            'annee' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ordre' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($timeline->image) {
                Storage::disk('public')->delete($timeline->image);
            }
            $validated['image'] = $request->file('image')->store('timeline', 'public');
        }

        $timeline->update($validated);

        return redirect()->route('admin.timeline.index')
            ->with('success', 'Événement de la timeline mis à jour avec succès.');
    }

    public function destroy(TimelineEvent $timeline)
    {
        // Supprimer l'image si elle existe
        if ($timeline->image) {
            Storage::disk('public')->delete($timeline->image);
        }

        $timeline->delete();

        return redirect()->route('admin.timeline.index')
            ->with('success', 'Événement de la timeline supprimé avec succès.');
    }
}
