@extends('layouts.admin')
@section('title', 'Fiyatlandırma')
@section('page-title', 'Fiyat Planları')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Toplam {{ $plans->count() }} plan</p>
    <a href="{{ route('admin.pricing.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Yeni Plan
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Plan Adı</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Fiyat</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium hidden md:table-cell">Özellikler</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Durum</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($plans as $plan)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-gray-900">{{ $plan->name }}</span>
                        @if($plan->featured)<span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full">Popüler</span>@endif
                    </div>
                </td>
                <td class="px-5 py-4 font-semibold text-blue-600">{{ number_format($plan->price, 0, ',', '.') }}₺ / {{ $plan->unit }}</td>
                <td class="px-5 py-4 hidden md:table-cell text-gray-500">{{ $plan->features ? count($plan->features) . ' özellik' : '-' }}</td>
                <td class="px-5 py-4">
                    @if($plan->active)<span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full font-medium">Aktif</span>
                    @else<span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full font-medium">Pasif</span>@endif
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2 justify-end">
                        <a href="{{ route('admin.pricing.edit', $plan) }}" class="text-blue-600 hover:text-blue-700 p-1.5 hover:bg-blue-50 rounded-lg transition"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.pricing.destroy', $plan) }}" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-600 p-1.5 hover:bg-red-50 rounded-lg transition"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-10 text-center text-gray-400">Henüz fiyat planı eklenmemiş.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
