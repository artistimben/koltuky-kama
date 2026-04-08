@extends('layouts.app')
@section('title', 'Hizmetlerimiz')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Hizmetlerimiz</span>
            <h1 class="text-4xl font-bold text-gray-900 mt-2">Sunduğumuz Hizmetler</h1>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Profesyonel ekipman ve organik ürünlerle tüm mobilya temizliği ihtiyaçlarınızı karşılıyoruz.</p>
        </div>

        @if($services->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition border border-gray-100">
                @if($service->image)
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                @else
                <div class="h-32 bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center">
                    <i class="fas {{ $service->icon ?? 'fa-couch' }} text-blue-400 text-5xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas {{ $service->icon ?? 'fa-couch' }} text-blue-600"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ $service->title }}</h3>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $service->description }}</p>
                    <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center gap-2 text-blue-600 font-semibold text-sm hover:text-blue-700">
                        Teklif Al <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-couch text-5xl mb-4"></i>
            <p>Hizmetler yakında eklenecek.</p>
        </div>
        @endif

        <div class="mt-16 bg-blue-600 rounded-3xl p-8 md:p-12 text-white text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-3">İstediğiniz Hizmeti Bulamadınız mı?</h2>
            <p class="text-blue-100 mb-6">Bizi arayın, ihtiyacınıza özel çözüm üretelim.</p>
            <a href="{{ route('contact') }}" class="bg-white text-blue-700 hover:bg-blue-50 px-8 py-3 rounded-xl font-semibold transition inline-block">
                Bizimle İletişime Geçin
            </a>
        </div>
    </div>
</div>
@endsection
