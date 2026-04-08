@extends('layouts.app')
@section('title', 'Yıkama Süreci')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Süreç</span>
            <h1 class="text-4xl font-bold text-gray-900 mt-2">Yıkama Sürecimiz</h1>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Koltuğunuzun teslim alınmasından tekrar elinize geçmesine kadar her aşamada titiz ve şeffaf bir süreç yürütüyoruz.</p>
        </div>

        @if($steps->count())
        <div class="space-y-8">
            @foreach($steps as $index => $step)
            <div class="flex gap-6 items-start bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex-shrink-0 w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-2xl">{{ $step->step_number }}</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        @if($step->icon)
                        <i class="fas {{ $step->icon }} text-blue-500 text-xl"></i>
                        @endif
                        <h3 class="font-bold text-gray-900 text-xl">{{ $step->title }}</h3>
                    </div>
                    <p class="text-gray-500 leading-relaxed">{{ $step->description }}</p>
                </div>
            </div>
            @if(!$loop->last)
            <div class="flex justify-center">
                <i class="fas fa-chevron-down text-blue-300 text-2xl"></i>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-list-check text-5xl mb-4"></i>
            <p>Süreç bilgileri yakında eklenecek.</p>
        </div>
        @endif

        <div class="mt-16 grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm">
                <i class="fas fa-leaf text-green-500 text-3xl mb-3"></i>
                <h3 class="font-bold text-gray-900 mb-2">Organik Ürünler</h3>
                <p class="text-gray-500 text-sm">Çevre dostu, çocuk ve evcil hayvan güvenli temizlik ürünleri kullanıyoruz.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm">
                <i class="fas fa-shield-alt text-blue-500 text-3xl mb-3"></i>
                <h3 class="font-bold text-gray-900 mb-2">Hasarsız Yıkama</h3>
                <p class="text-gray-500 text-sm">Kumaş ve deri koltuklar için özel tekniklerle zarar vermeden temizliyoruz.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm">
                <i class="fas fa-clock text-yellow-500 text-3xl mb-3"></i>
                <h3 class="font-bold text-gray-900 mb-2">Hızlı Teslimat</h3>
                <p class="text-gray-500 text-sm">İşlem tamamlandıktan sonra en kısa sürede koltuğunuzu evinize teslim ediyoruz.</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('contact') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition inline-block shadow-lg">
                <i class="fas fa-phone mr-2"></i>Hemen Randevu Al
            </a>
        </div>
    </div>
</div>
@endsection
