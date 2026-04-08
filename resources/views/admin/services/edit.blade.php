@extends('layouts.admin')
@section('title', 'Hizmet Düzenle')
@section('page-title', 'Hizmet Düzenle')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Hizmet Adı *</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kısa Açıklama</label>
            <input type="text" name="short_description" value="{{ old('short_description', $service->short_description) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Detaylı Açıklama *</label>
            <textarea name="description" rows="4" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Font Awesome İkon</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sıra No</label>
                <input type="number" name="order" value="{{ old('order', $service->order) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Görsel</label>
            @if($service->image)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$service->image) }}" alt="Mevcut" class="h-20 rounded-lg object-cover">
            </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="active" id="active" {{ $service->active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded">
            <label for="active" class="text-sm text-gray-700">Aktif</label>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">Güncelle</button>
            <a href="{{ route('admin.services.index') }}" class="border border-gray-200 text-gray-600 hover:bg-gray-50 px-6 py-2.5 rounded-xl text-sm font-medium transition">İptal</a>
        </div>
    </form>
</div>
@endsection
