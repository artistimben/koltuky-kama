@extends('layouts.admin')
@section('title', 'Hizmetler')
@section('page-title', 'Hizmetler')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Toplam {{ $services->count() }} hizmet</p>
    <a href="{{ route('admin.services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Yeni Hizmet
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Hizmet</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium hidden md:table-cell">İkon</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium hidden md:table-cell">Sıra</th>
                <th class="text-left px-5 py-3 text-gray-500 font-medium">Durum</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($services as $service)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-5 py-4">
                    <div class="font-medium text-gray-900">{{ $service->title }}</div>
                    <div class="text-gray-400 text-xs mt-0.5">{{ Str::limit($service->short_description ?? $service->description, 60) }}</div>
                </td>
                <td class="px-5 py-4 hidden md:table-cell">
                    <i class="fas {{ $service->icon ?? 'fa-couch' }} text-blue-500"></i>
                </td>
                <td class="px-5 py-4 hidden md:table-cell text-gray-500">{{ $service->order }}</td>
                <td class="px-5 py-4">
                    @if($service->active)
                    <span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full font-medium">Aktif</span>
                    @else
                    <span class="bg-gray-100 text-gray-500 text-xs px-2.5 py-1 rounded-full font-medium">Pasif</span>
                    @endif
                </td>
                <td class="px-5 py-4">
                    <div class="flex items-center gap-2 justify-end">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:text-blue-700 p-1.5 hover:bg-blue-50 rounded-lg transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Bu hizmeti silmek istediğinize emin misiniz?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-600 p-1.5 hover:bg-red-50 rounded-lg transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-10 text-center text-gray-400">Henüz hizmet eklenmemiş.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
