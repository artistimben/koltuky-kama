@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-couch text-blue-600"></i>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['services'] }}</div>
        <div class="text-gray-500 text-sm">Hizmet</div>
    </div>
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-tags text-green-600"></i>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['pricing'] }}</div>
        <div class="text-gray-500 text-sm">Fiyat Planı</div>
    </div>
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-list-check text-purple-600"></i>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['process'] }}</div>
        <div class="text-gray-500 text-sm">Süreç Adımı</div>
    </div>
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-envelope text-yellow-600"></i>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['messages'] }}</div>
        <div class="text-gray-500 text-sm">Toplam Mesaj</div>
    </div>
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-bell text-red-600"></i>
            </div>
        </div>
        <div class="text-2xl font-bold text-gray-900">{{ $stats['unread'] }}</div>
        <div class="text-gray-500 text-sm">Okunmamış</div>
    </div>
</div>

<div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900">Son Mesajlar</h3>
            <a href="{{ route('admin.contact.index') }}" class="text-blue-600 text-sm hover:text-blue-700">Tümünü Gör</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentMessages as $msg)
            <a href="{{ route('admin.contact.show', $msg) }}" class="flex items-start gap-3 p-4 hover:bg-gray-50 transition {{ !$msg->is_read ? 'bg-blue-50' : '' }}">
                <div class="w-9 h-9 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-sm font-bold flex-shrink-0">
                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <p class="font-medium text-gray-900 text-sm">{{ $msg->name }}</p>
                        @if(!$msg->is_read)<span class="w-2 h-2 bg-blue-500 rounded-full"></span>@endif
                    </div>
                    <p class="text-gray-500 text-xs truncate">{{ $msg->message }}</p>
                    <p class="text-gray-400 text-xs mt-0.5">{{ $msg->created_at->diffForHumans() }}</p>
                </div>
            </a>
            @empty
            <div class="p-6 text-center text-gray-400 text-sm">Henüz mesaj yok.</div>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="p-5 border-b border-gray-100">
            <h3 class="font-semibold text-gray-900">Hızlı Erişim</h3>
        </div>
        <div class="p-5 grid grid-cols-2 gap-3">
            <a href="{{ route('admin.services.create') }}" class="flex items-center gap-3 p-3 border border-gray-100 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition group">
                <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-600 transition">
                    <i class="fas fa-plus text-blue-600 group-hover:text-white transition text-sm"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Hizmet Ekle</span>
            </a>
            <a href="{{ route('admin.pricing.create') }}" class="flex items-center gap-3 p-3 border border-gray-100 rounded-xl hover:border-green-300 hover:bg-green-50 transition group">
                <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-600 transition">
                    <i class="fas fa-plus text-green-600 group-hover:text-white transition text-sm"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Fiyat Ekle</span>
            </a>
            <a href="{{ route('admin.process.create') }}" class="flex items-center gap-3 p-3 border border-gray-100 rounded-xl hover:border-purple-300 hover:bg-purple-50 transition group">
                <div class="w-9 h-9 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-600 transition">
                    <i class="fas fa-plus text-purple-600 group-hover:text-white transition text-sm"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Süreç Ekle</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 p-3 border border-gray-100 rounded-xl hover:border-gray-300 hover:bg-gray-50 transition group">
                <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-gray-600 transition">
                    <i class="fas fa-cog text-gray-600 group-hover:text-white transition text-sm"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Ayarlar</span>
            </a>
        </div>
    </div>
</div>
@endsection
