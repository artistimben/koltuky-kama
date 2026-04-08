<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Yönetim Paneli</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

<div class="flex h-screen overflow-hidden">
    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 text-gray-300 flex flex-col flex-shrink-0">
        <div class="p-5 border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-couch text-white"></i>
                </div>
                <div>
                    <div class="text-white font-bold text-sm">Yönetim Paneli</div>
                    <div class="text-gray-500 text-xs">Koltuk Yıkama</div>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home w-5"></i> Dashboard
            </a>
            <div class="pt-3 pb-1">
                <p class="text-gray-600 text-xs uppercase tracking-wider px-3">İçerik Yönetimi</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="admin-nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <i class="fas fa-couch w-5"></i> Hizmetler
            </a>
            <a href="{{ route('admin.process.index') }}" class="admin-nav-link {{ request()->routeIs('admin.process*') ? 'active' : '' }}">
                <i class="fas fa-list-check w-5"></i> Süreç Adımları
            </a>
            <a href="{{ route('admin.pricing.index') }}" class="admin-nav-link {{ request()->routeIs('admin.pricing*') ? 'active' : '' }}">
                <i class="fas fa-tags w-5"></i> Fiyatlandırma
            </a>
            <div class="pt-3 pb-1">
                <p class="text-gray-600 text-xs uppercase tracking-wider px-3">Müşteriler</p>
            </div>
            <a href="{{ route('admin.contact.index') }}" class="admin-nav-link {{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                <i class="fas fa-envelope w-5"></i> Mesajlar
                @php $unread = \App\Models\ContactMessage::where('is_read', false)->count() @endphp
                @if($unread > 0)
                <span class="ml-auto bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">{{ $unread }}</span>
                @endif
            </a>
            <div class="pt-3 pb-1">
                <p class="text-gray-600 text-xs uppercase tracking-wider px-3">Sistem</p>
            </div>
            <a href="{{ route('admin.settings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <i class="fas fa-cog w-5"></i> Site Ayarları
            </a>
            <a href="{{ route('home') }}" target="_blank" class="admin-nav-link">
                <i class="fas fa-external-link-alt w-5"></i> Siteyi Görüntüle
            </a>
        </nav>

        <div class="p-4 border-t border-gray-800">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-xs font-bold text-white">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <div class="text-white text-sm font-medium">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="text-gray-500 text-xs">Yönetici</div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="w-full text-left text-gray-400 hover:text-white text-sm flex items-center gap-2 transition">
                    <i class="fas fa-sign-out-alt w-5"></i> Çıkış Yap
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <h1 class="text-xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
            <div class="flex items-center gap-3 text-sm text-gray-500">
                <i class="fas fa-calendar-alt"></i>
                {{ now()->format('d F Y') }}
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-4 flex items-center gap-3">
                <i class="fas fa-check-circle text-green-500"></i>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-4 flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-500"></i>
                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
