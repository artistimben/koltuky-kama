<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'name.required'    => 'Ad Soyad zorunludur.',
            'email.required'   => 'E-posta adresi zorunludur.',
            'email.email'      => 'Geçerli bir e-posta adresi giriniz.',
            'message.required' => 'Mesaj alanı zorunludur.',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.');
    }
}
