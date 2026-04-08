@extends('layouts.admin')
@section('title', 'Mesajlar')
@section('page-title', 'Müşteri Mesajları')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Gönderen</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium hidden md:table-cell">Konu</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium hidden md:table-cell">Tarih</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Durum</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($messages as $msg)
            <tr class="hover:bg-gray-50 {{ !$msg->is_read ? 'bg-blue-50/50' : '' }}">
                <td class="px-5 py-4">
                    <div class="font-medium text-gray-900 flex items-center gap-2">
                        @if(!$msg->is_read)<span class="w-2 h-2 bg-blue-500 rounded-full"></span>@endif
                        {{ $msg->name }}
                    </div>
                    <div class="text-gray-400 text-xs">{{ $msg->email }}</div>
                    @if($msg->phone)<div class="text-gray-400 text-xs">{{ $msg->phone }}</div>@endif
                </td>
                <td class="px-5 py-4 hidden md:table-cell text-gray-500">{{ $msg->subject ?? Str::limit($msg->message, 50) }}</td>
                <td class="px-5 py-4 hidden md:table-cell text-gray-400 text-xs">{{ $msg->created_at->format('d.m.Y H:i') }}</td>
                <td class="px-5 py-4">
                    @if($msg->is_read)<span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full">Okundu</span>
                    @else<span class="bg-blue-100 text-blue-700 text-xs px-2.5 py-1 rounded-full font-medium">Yeni</span>@endif
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2 justify-end">
                        <a href="{{ route('admin.contact.show', $msg) }}" class="text-blue-600 hover:text-blue-700 p-1.5 hover:bg-blue-50 rounded-lg transition"><i class="fas fa-eye"></i></a>
                        <form method="POST" action="{{ route('admin.contact.destroy', $msg) }}" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-600 p-1.5 hover:bg-red-50 rounded-lg transition"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-10 text-center text-gray-400">Henüz mesaj yok.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($messages->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">{{ $messages->links() }}</div>
    @endif
</div>
@endsection
