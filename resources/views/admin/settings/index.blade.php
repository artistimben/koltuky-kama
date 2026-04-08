@extends('layouts.admin')
@section('title', 'Site Ayarları')
@section('page-title', 'Site Ayarları')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
    @csrf @method('PUT')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2"><i class="fas fa-globe text-blue-500"></i> Genel Bilgiler</h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Site Başlığı *</label>
                <input type="text" name="site_title" value="{{ $settings['site_title']->value ?? 'Dörtyol Koltuk Yıkama' }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Site Alt Başlığı</label>
                <input type="text" name="site_subtitle" value="{{ $settings['site_subtitle']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Hero Başlığı</label>
                <input type="text" name="hero_title" value="{{ $settings['hero_title']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Koltuğunuz Yeniden">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Hero Alt Metni</label>
                <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Hakkımızda Metni</label>
            <textarea name="about_text" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ $settings['about_text']->value ?? '' }}</textarea>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2"><i class="fas fa-phone text-green-500"></i> İletişim Bilgileri</h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                <input type="text" name="phone" value="{{ $settings['phone']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0555 000 00 00">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telefon 2</label>
                <input type="text" name="phone2" value="{{ $settings['phone2']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ $settings['whatsapp']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="905550000000">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-posta</label>
                <input type="email" name="email" value="{{ $settings['email']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Çalışma Saatleri</label>
                <input type="text" name="working_hours" value="{{ $settings['working_hours']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Pzt-Cmt 08:00 - 18:00">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adres</label>
                <input type="text" name="address" value="{{ $settings['address']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Hatay, Dörtyol">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2"><i class="fas fa-share-alt text-purple-500"></i> Sosyal Medya</h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><i class="fab fa-instagram text-pink-500 mr-1"></i> Instagram URL</label>
                <input type="text" name="instagram" value="{{ $settings['instagram']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><i class="fab fa-facebook text-blue-600 mr-1"></i> Facebook URL</label>
                <input type="text" name="facebook" value="{{ $settings['facebook']->value ?? '' }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2"><i class="fas fa-map text-red-500"></i> Google Maps</h3>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Google Maps Embed Kodu</label>
            <textarea name="maps_embed" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none font-mono text-xs" placeholder='<iframe src="..." ...></iframe>'>{{ $settings['maps_embed']->value ?? '' }}</textarea>
            <p class="text-gray-400 text-xs mt-1">Google Maps'ten "Harita paylaş → HTML yerleştir" ile alınan iframe kodu</p>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition flex items-center gap-2">
            <i class="fas fa-save"></i> Ayarları Kaydet
        </button>
    </div>
</form>
@endsection
