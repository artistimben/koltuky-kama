<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\PricingPlan;
use App\Models\ProcessStep;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'  => Service::count(),
            'pricing'   => PricingPlan::count(),
            'process'   => ProcessStep::count(),
            'messages'  => ContactMessage::count(),
            'unread'    => ContactMessage::where('is_read', false)->count(),
        ];
        $recentMessages = ContactMessage::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(\Illuminate\Http\Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'E-posta veya şifre hatalı.']);
    }

    public function logout(\Illuminate\Http\Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
