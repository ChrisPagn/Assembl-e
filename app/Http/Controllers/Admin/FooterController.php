<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterController extends Controller
{
    public function edit()
    {
        $footerSettings = Setting::where('key', 'like', 'footer_%')->get();
        return view('admin.footer.edit', compact('footerSettings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            Setting::set($key, $value);
        }

        Cache::flush();

        return redirect()->route('admin.footer.edit')
            ->with('success', 'Contenus du footer mis à jour avec succès');
    }
}
