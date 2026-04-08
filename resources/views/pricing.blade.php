@extends('layouts.app')
@section('title', 'Fiyatlandırma')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Fiyatlandırma</span>
            <h1 class="text-4xl font-bold text-gray-900 mt-2">Şeffaf ve Uygun Fiyatlar</h1>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Gizli ücret yok. Tüm fiyatlarımız aşağıda listelenmiştir. Koltuk sayınıza göre indirim alabilirsiniz.</p>
        </div>

        @if($plans->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($plans as $plan)
            <div class="bg-white rounded-2xl p-8 border-2 {{ $plan->featured ? 'border-blue-600 shadow-xl relative' : 'border-gray-100 shadow-sm' }} hover:shadow-lg transition">
                @if($plan->featured)
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-xs font-bold px-6 py-1.5 rounded-full shadow">
                    <i class="fas fa-star mr-1"></i> En Popüler
                </div>
                @endif
                <h3 class="font-bold text-gray-900 text-xl mb-1">{{ $plan->name }}</h3>
                @if($plan->description)
                <p class="text-gray-400 text-sm mb-4">{{ $plan->description }}</p>
                @endif
                <div class="flex items-baseline gap-1 mb-6 pb-6 border-b border-gray-100">
                    <span class="text-4xl font-bold {{ $plan->featured ? 'text-blue-600' : 'text-gray-900' }}">
                        {{ number_format($plan->price, 0, ',', '.') }}₺
                    </span>
                    <span class="text-gray-400">/{{ $plan->unit }}</span>
                </div>
                @if($plan->features)
                <ul class="space-y-3 mb-8">
                    @foreach($plan->features as $feature)
                    <li class="flex items-center gap-3 text-gray-600 text-sm">
                        <i class="fas fa-check-circle {{ $plan->featured ? 'text-blue-500' : 'text-green-500' }}"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                @endif
                <a href="{{ route('contact') }}"
                   class="block text-center w-full py-3 rounded-xl font-semibold transition {{ $plan->featured ? 'bg-blue-600 hover:bg-blue-700 text-white' : 'border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white' }}">
                    Teklif Al
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-tags text-5xl mb-4"></i>
            <p>Fiyat bilgileri yakında eklenecek.</p>
        </div>
        @endif

        <div class="mt-12 bg-blue-50 border border-blue-100 rounded-2xl p-6 text-center">
            <i class="fas fa-info-circle text-blue-500 text-2xl mb-3"></i>
            <p class="text-gray-700 font-medium mb-1">Toplu Sipariş İndirimi</p>
            <p class="text-gray-500 text-sm">5 ve üzeri koltuk yıkamalarında özel indirim uyguluyoruz. Detaylar için bizi arayın.</p>
            <a href="{{ route('contact') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-semibold text-sm transition">
                Toplu Fiyat İste
            </a>
        </div>
    </div>
</div>
@endsection
