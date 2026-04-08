<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_title'    => 'required|string|max:255',
            'site_subtitle' => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:20',
            'phone2'        => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255',
            'address'       => 'nullable|string|max:500',
            'whatsapp'      => 'nullable|string|max:20',
            'instagram'     => 'nullable|string|max:255',
            'facebook'      => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:255',
            'hero_title'    => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:500',
            'about_text'    => 'nullable|string',
            'maps_embed'    => 'nullable|string',
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return back()->with('success', 'Ayarlar kaydedildi.');
    }
}
