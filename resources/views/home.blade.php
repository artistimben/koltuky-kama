@extends('layouts.app')

@section('title', 'Anasayfa')
@section('meta_description', 'Hatay Dörtyol\'da profesyonel koltuk yıkama hizmetleri. Uzman ekibimizle koltuk, kanepe, halı temizliği.')

@section('content')

{{-- Hero --}}
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-blue-700/50 backdrop-blur rounded-full px-4 py-2 text-sm mb-6">
                    <i class="fas fa-star text-yellow-400"></i>
                    <span>Hatay Dörtyol'un #1 Koltuk Yıkama Hizmeti</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    {{ \App\Models\Setting::get('hero_title', 'Koltuğunuz Yeniden') }}<br>
                    <span class="text-blue-300">Pırıl Pırıl</span> Olsun!
                </h1>
                <p class="text-blue-100 text-lg mb-8 leading-relaxed">
                    {{ \App\Models\Setting::get('hero_subtitle', 'Profesyonel ekipman ve organik temizlik ürünleriyle koltuk, kanepe ve halılarınızı derinlemesine temizliyoruz. Evinize teslim, yerinizde yıkama imkânı.') }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="bg-white text-blue-700 hover:bg-blue-50 px-8 py-3 rounded-xl font-semibold transition shadow-lg">
                        <i class="fas fa-phone mr-2"></i>Hemen Ara
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white/50 hover:border-white text-white px-8 py-3 rounded-xl font-semibold transition">
                        Hizmetlerimiz <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="flex flex-wrap gap-6 mt-10">
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span class="text-sm">Organik Ürünler</span>
                    </div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span class="text-sm">Aynı Gün Teslimat</span>
                    </div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span class="text-sm">Ücretsiz Keşif</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex justify-center">
                <div class="relative">
                    <div class="w-80 h-80 bg-blue-600/30 rounded-3xl flex items-center justify-center backdrop-blur border border-white/10">
                        <i class="fas fa-couch text-9xl text-blue-200"></i>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-yellow-400 text-yellow-900 rounded-2xl px-4 py-2 font-bold text-sm shadow-lg">
                        <i class="fas fa-shield-alt mr-1"></i> %100 Memnuniyet
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-green-400 text-green-900 rounded-2xl px-4 py-2 font-bold text-sm shadow-lg">
                        <i class="fas fa-leaf mr-1"></i> Ekolojik Ürünler
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="text-3xl font-bold text-blue-600">500+</div>
                <div class="text-gray-500 text-sm mt-1">Mutlu Müşteri</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-blue-600">5+</div>
                <div class="text-gray-500 text-sm mt-1">Yıl Tecrübe</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-blue-600">%100</div>
                <div class="text-gray-500 text-sm mt-1">Müşteri Memnuniyeti</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-blue-600">24s</div>
                <div class="text-gray-500 text-sm mt-1">İçinde Teslimat</div>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
@if($services->count())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Hizmetlerimiz</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Ne Temizliyoruz?</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Tüm mobilya ve halı türleri için profesyonel yıkama çözümleri sunuyoruz.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition border border-gray-100 group">
                <div class="w-14 h-14 bg-blue-50 group-hover:bg-blue-600 rounded-xl flex items-center justify-center mb-4 transition">
                    <i class="fas {{ $service->icon ?? 'fa-couch' }} text-blue-600 group-hover:text-white text-xl transition"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $service->title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service->short_description ?? Str::limit($service->description, 120) }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700">
                Tüm Hizmetleri Gör <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Process --}}
@if($processSteps->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Süreç</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Nasıl Çalışıyoruz?</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Koltuğunuzu teslim aldığımız andan itibaren her adımı titizlikle uyguluyoruz.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($processSteps as $step)
            <div class="text-center relative">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <span class="text-white font-bold text-xl">{{ $step->step_number }}</span>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">{{ $step->title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ Str::limit($step->description, 100) }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('process') }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700">
                Süreci Detaylı İncele <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Pricing --}}
@if($pricingPlans->count())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Fiyatlandırma</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Uygun Fiyatlar</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Kaliteden ödün vermeden rekabetçi fiyatlarla hizmet sunuyoruz.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @foreach($pricingPlans as $plan)
            <div class="bg-white rounded-2xl p-6 border-2 {{ $plan->featured ? 'border-blue-600 shadow-xl relative' : 'border-gray-100 shadow-sm' }} transition hover:shadow-md">
                @if($plan->featured)
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-xs font-bold px-4 py-1 rounded-full">Popüler</div>
                @endif
                <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $plan->name }}</h3>
                @if($plan->description)<p class="text-gray-500 text-sm mb-4">{{ $plan->description }}</p>@endif
                <div class="flex items-baseline gap-1 mb-6">
                    <span class="text-3xl font-bold text-blue-600">{{ number_format($plan->price, 0, ',', '.') }}₺</span>
                    <span class="text-gray-400 text-sm">/{{ $plan->unit }}</span>
                </div>
                @if($plan->features)
                <ul class="space-y-2 mb-6">
                    @foreach($plan->features as $feature)
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-check text-green-500"></i> {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                @endif
                <a href="{{ route('contact') }}" class="block text-center {{ $plan->featured ? 'bg-blue-600 hover:bg-blue-700 text-white' : 'border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white' }} py-2.5 rounded-xl font-semibold transition text-sm">
                    Teklif Al
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('pricing') }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700">
                Tüm Fiyatları Gör <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-20 bg-blue-600 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ücretsiz Keşif İsteyin</h2>
        <p class="text-blue-100 text-lg mb-8">Uzmanlarımız evinize gelsin, koltukları incelesin ve size özel fiyat teklifi sunsun.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="bg-white text-blue-700 hover:bg-blue-50 px-8 py-3 rounded-xl font-semibold transition shadow-lg">
                <i class="fas fa-calendar-check mr-2"></i>Randevu Al
            </a>
            @if(\App\Models\Setting::get('whatsapp'))
            <a href="https://wa.me/{{ preg_replace('/\D/', '', \App\Models\Setting::get('whatsapp')) }}?text=Merhaba, koltuk yıkama hakkında bilgi almak istiyorum." 
               class="bg-green-500 hover:bg-green-400 text-white px-8 py-3 rounded-xl font-semibold transition" target="_blank">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp'tan Yaz
            </a>
            @endif
        </div>
    </div>
</section>

@endsection
