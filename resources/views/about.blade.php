@extends('layouts.app')
@section('title', 'Hakkımızda')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Hakkımızda</span>
            <h1 class="text-4xl font-bold text-gray-900 mt-2">Biz Kimiz?</h1>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <div class="w-full h-72 bg-gradient-to-br from-blue-100 to-blue-200 rounded-3xl flex items-center justify-center">
                    <i class="fas fa-couch text-blue-400 text-9xl"></i>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Hatay Dörtyol'un Güvenilir Koltuk Yıkama Hizmeti</h2>
                <p class="text-gray-500 leading-relaxed mb-4">
                    {{ \App\Models\Setting::get('about_text', 'Yılların deneyimi ve uzman ekibimizle Hatay Dörtyol\'da koltuk, kanepe, halı ve mobilya temizliği hizmetleri sunuyoruz. Müşteri memnuniyetini her şeyin önünde tutarak çalışıyoruz.') }}
                </p>
                <p class="text-gray-500 leading-relaxed mb-6">
                    Kullandığımız organik ve çevre dostu temizlik maddeleri hem insan sağlığına hem de mobilyalarınıza zarar vermez. Profesyonel ekipmanlarımızla derin temizlik yaparak kötü koku ve bakterileri yok ediyoruz.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-2 bg-green-50 text-green-700 px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-leaf"></i> Organik Ürünler
                    </div>
                    <div class="flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-certificate"></i> Uzman Ekip
                    </div>
                    <div class="flex items-center gap-2 bg-yellow-50 text-yellow-700 px-4 py-2 rounded-lg text-sm font-medium">
                        <i class="fas fa-star"></i> 5 Yıl+ Deneyim
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="text-3xl font-bold text-blue-600">500+</div>
                <div class="text-gray-500 text-sm mt-1">Mutlu Müşteri</div>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="text-3xl font-bold text-blue-600">5+</div>
                <div class="text-gray-500 text-sm mt-1">Yıl Tecrübe</div>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="text-3xl font-bold text-blue-600">%100</div>
                <div class="text-gray-500 text-sm mt-1">Memnuniyet</div>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="text-3xl font-bold text-blue-600">2000+</div>
                <div class="text-gray-500 text-sm mt-1">Yıkanan Koltuk</div>
            </div>
        </div>

        <div class="bg-blue-600 rounded-3xl p-8 text-white text-center">
            <h2 class="text-2xl font-bold mb-3">Sizi de Ailemize Katmak İstiyoruz</h2>
            <p class="text-blue-100 mb-6">Koltuklarınızın tertemiz olması için bizi arayın.</p>
            <a href="{{ route('contact') }}" class="bg-white text-blue-700 hover:bg-blue-50 px-8 py-3 rounded-xl font-semibold transition inline-block">
                İletişime Geç
            </a>
        </div>
    </div>
</div>
@endsection
