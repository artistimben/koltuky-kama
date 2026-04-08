@extends('layouts.admin')
@section('title', 'Mesaj Detayı')
@section('page-title', 'Mesaj Detayı')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-start justify-between mb-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-lg">{{ $contact->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ $contact->email }}</p>
                    @if($contact->phone)<p class="text-gray-500 text-sm">{{ $contact->phone }}</p>@endif
                </div>
            </div>
            <span class="text-gray-400 text-sm">{{ $contact->created_at->format('d.m.Y H:i') }}</span>
        </div>

        @if($contact->subject)
        <div class="mb-4 pb-4 border-b border-gray-100">
            <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Konu</p>
            <p class="font-medium text-gray-900 mt-1">{{ $contact->subject }}</p>
        </div>
        @endif

        <div>
            <p class="text-xs text-gray-400 uppercase tracking-wide font-medium mb-2">Mesaj</p>
            <div class="bg-gray-50 rounded-xl p-4 text-gray-700 leading-relaxed">
                {{ $contact->message }}
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <a href="mailto:{{ $contact->email }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2">
                <i class="fas fa-reply"></i> E-posta ile Yanıtla
            </a>
            @if($contact->phone)
            <a href="tel:{{ preg_replace('/\s+/', '', $contact->phone) }}" class="border border-gray-200 text-gray-600 hover:bg-gray-50 px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2">
                <i class="fas fa-phone"></i> Ara
            </a>
            @endif
            <a href="{{ route('admin.contact.index') }}" class="border border-gray-200 text-gray-600 hover:bg-gray-50 px-5 py-2.5 rounded-xl text-sm font-medium transition ml-auto">
                Geri Dön
            </a>
        </div>
    </div>
</div>
@endsection
