<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
     public function send(Request $request)
    {
        // 1) Validation
        $data = $request->validate([
            'nom'     => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'sujet'   => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        // 2) Enregistrement en base
        ContactMessage::create($data);

        // 3) Message de confirmation
        return back()->with('success', 'Merci, votre message a bien été envoyé.');
    }
}
