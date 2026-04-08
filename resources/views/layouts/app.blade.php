<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Hatay Dörtyol\'un en güvenilir koltuk yıkama hizmeti. Profesyonel ekipman ve organik ürünlerle koltuk, kanepe, halı yıkama.')">
    <title>@yield('title', 'Anasayfa') | {{ \App\Models\Setting::get('site_title', 'Dörtyol Koltuk Yıkama') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-gray-800">

{{-- Navbar --}}
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-couch text-white text-lg"></i>
                </div>
                <div>
                    <div class="font-bold text-gray-900 text-lg leading-tight">{{ \App\Models\Setting::get('site_title', 'Dörtyol Koltuk Yıkama') }}</div>
                    <div class="text-xs text-blue-600">Profesyonel Temizlik</div>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Anasayfa</a>
                <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Hizmetler</a>
                <a href="{{ route('process') }}" class="nav-link {{ request()->routeIs('process') ? 'active' : '' }}">Süreç</a>
                <a href="{{ route('pricing') }}" class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">Fiyatlar</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Hakkımızda</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">İletişim</a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                @php $phone = \App\Models\Setting::get('phone', '0555 000 00 00') @endphp
                <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    <i class="fas fa-phone"></i> {{ $phone }}
                </a>
            </div>

            {{-- Mobile menu button --}}
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="mobile-nav-link">Anasayfa</a>
            <a href="{{ route('services') }}" class="mobile-nav-link">Hizmetler</a>
            <a href="{{ route('process') }}" class="mobile-nav-link">Süreç</a>
            <a href="{{ route('pricing') }}" class="mobile-nav-link">Fiyatlar</a>
            <a href="{{ route('about') }}" class="mobile-nav-link">Hakkımızda</a>
            <a href="{{ route('contact') }}" class="mobile-nav-link">İletişim</a>
            @php $phone = \App\Models\Setting::get('phone', '0555 000 00 00') @endphp
            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium mt-2">
                <i class="fas fa-phone"></i> {{ $phone }}
            </a>
        </div>
    </div>
</nav>

@yield('content')

{{-- Footer --}}
<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-couch text-white text-lg"></i>
                    </div>
                    <div class="font-bold text-white text-lg">{{ \App\Models\Setting::get('site_title', 'Dörtyol Koltuk Yıkama') }}</div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    {{ \App\Models\Setting::get('about_text', 'Hatay Dörtyol\'da profesyonel koltuk, kanepe ve halı yıkama hizmetleri sunuyoruz. Organik ürünler ve uzman ekibimizle mobilyalarınızı temizliyoruz.') }}
                </p>
                <div class="flex gap-3">
                    @if(\App\Models\Setting::get('instagram'))
                    <a href="{{ \App\Models\Setting::get('instagram') }}" class="w-9 h-9 bg-gray-700 hover:bg-pink-600 rounded-lg flex items-center justify-center transition"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('facebook'))
                    <a href="{{ \App\Models\Setting::get('facebook') }}" class="w-9 h-9 bg-gray-700 hover:bg-blue-600 rounded-lg flex items-center justify-center transition"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(\App\Models\Setting::get('whatsapp'))
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', \App\Models\Setting::get('whatsapp')) }}" class="w-9 h-9 bg-gray-700 hover:bg-green-600 rounded-lg flex items-center justify-center transition"><i class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Hızlı Bağlantılar</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Anasayfa</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-blue-400 transition">Hizmetler</a></li>
                    <li><a href="{{ route('process') }}" class="hover:text-blue-400 transition">Yıkama Süreci</a></li>
                    <li><a href="{{ route('pricing') }}" class="hover:text-blue-400 transition">Fiyatlandırma</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-400 transition">Hakkımızda</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition">İletişim</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">İletişim</h4>
                <ul class="space-y-3 text-sm">
                    @if(\App\Models\Setting::get('phone'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-phone text-blue-400 mt-0.5"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', \App\Models\Setting::get('phone')) }}" class="hover:text-blue-400 transition">{{ \App\Models\Setting::get('phone') }}</a>
                    </li>
                    @endif
                    @if(\App\Models\Setting::get('email'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-envelope text-blue-400 mt-0.5"></i>
                        <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="hover:text-blue-400 transition">{{ \App\Models\Setting::get('email') }}</a>
                    </li>
                    @endif
                    @if(\App\Models\Setting::get('address'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-map-marker-alt text-blue-400 mt-0.5"></i>
                        <span>{{ \App\Models\Setting::get('address') }}</span>
                    </li>
                    @endif
                    @if(\App\Models\Setting::get('working_hours'))
                    <li class="flex items-start gap-2">
                        <i class="fas fa-clock text-blue-400 mt-0.5"></i>
                        <span>{{ \App\Models\Setting::get('working_hours') }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_title', 'Dörtyol Koltuk Yıkama') }}. Tüm hakları saklıdır.</p>
            <p class="mt-2 md:mt-0">Hatay / Dörtyol</p>
        </div>
    </div>
</footer>

{{-- WhatsApp FAB --}}
@if(\App\Models\Setting::get('whatsapp'))
<a href="https://wa.me/{{ preg_replace('/\D/', '', \App\Models\Setting::get('whatsapp')) }}?text=Merhaba, koltuk yıkama hizmeti hakkında bilgi almak istiyorum." 
   class="fixed bottom-6 right-6 w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg transition-transform hover:scale-110 z-50"
   target="_blank">
    <i class="fab fa-whatsapp text-white text-2xl"></i>
</a>
@endif

<script>
document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});
</script>
@stack('scripts')
</body>
</html>
