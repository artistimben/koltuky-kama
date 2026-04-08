@extends('layouts.app')
@section('title', 'İletişim')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">İletişim</span>
            <h1 class="text-4xl font-bold text-gray-900 mt-2">Bize Ulaşın</h1>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Randevu almak veya fiyat teklifi için aşağıdaki formu doldurun, sizi arayalım.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- Contact Info --}}
            <div class="space-y-4">
                @if(\App\Models\Setting::get('phone'))
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-phone text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 font-medium uppercase tracking-wide">Telefon</div>
                        <a href="tel:{{ preg_replace('/\s+/', '', \App\Models\Setting::get('phone')) }}" class="font-semibold text-gray-900 hover:text-blue-600">{{ \App\Models\Setting::get('phone') }}</a>
                        @if(\App\Models\Setting::get('phone2'))
                        <br><a href="tel:{{ preg_replace('/\s+/', '', \App\Models\Setting::get('phone2')) }}" class="font-semibold text-gray-900 hover:text-blue-600 text-sm">{{ \App\Models\Setting::get('phone2') }}</a>
                        @endif
                    </div>
                </div>
                @endif

                @if(\App\Models\Setting::get('whatsapp'))
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 font-medium uppercase tracking-wide">WhatsApp</div>
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', \App\Models\Setting::get('whatsapp')) }}" class="font-semibold text-gray-900 hover:text-green-600" target="_blank">{{ \App\Models\Setting::get('whatsapp') }}</a>
                    </div>
                </div>
                @endif

                @if(\App\Models\Setting::get('email'))
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-envelope text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 font-medium uppercase tracking-wide">E-posta</div>
                        <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="font-semibold text-gray-900 hover:text-blue-600 text-sm">{{ \App\Models\Setting::get('email') }}</a>
                    </div>
                </div>
                @endif

                @if(\App\Models\Setting::get('address'))
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 font-medium uppercase tracking-wide">Adres</div>
                        <p class="font-medium text-gray-900 text-sm">{{ \App\Models\Setting::get('address') }}</p>
                    </div>
                </div>
                @endif

                @if(\App\Models\Setting::get('working_hours'))
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 font-medium uppercase tracking-wide">Çalışma Saatleri</div>
                        <p class="font-medium text-gray-900 text-sm">{{ \App\Models\Setting::get('working_hours') }}</p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Contact Form --}}
            <div class="md:col-span-2 bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-6 flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ad Soyad *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full border {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">E-posta *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konu</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Koltuk yıkama fiyatı..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mesajınız *</label>
                        <textarea name="message" rows="5" required placeholder="Kaç koltuk veya kanepe yıkatmak istediğinizi, varsa özel isteklerinizi yazabilirsiniz..."
                            class="w-full border {{ $errors->has('message') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i> Mesaj Gönder
                    </button>
                </form>
            </div>
        </div>

        {{-- Map --}}
        @if(\App\Models\Setting::get('maps_embed'))
        <div class="mt-8 rounded-2xl overflow-hidden shadow-sm border border-gray-100 h-64">
            {!! \App\Models\Setting::get('maps_embed') !!}
        </div>
        @endif
    </div>
</div>
@endsection
