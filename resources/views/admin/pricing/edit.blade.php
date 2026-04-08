@extends('layouts.admin')
@section('title', 'Fiyat Planı Düzenle')
@section('page-title', 'Fiyat Planı Düzenle')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.pricing.update', $pricing) }}" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Plan Adı *</label>
                <input type="text" name="name" value="{{ old('name', $pricing->name) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fiyat (₺) *</label>
                <input type="number" name="price" value="{{ old('price', $pricing->price) }}" required min="0" step="0.01" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Birim *</label>
                <input type="text" name="unit" value="{{ old('unit', $pricing->unit) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sıra No</label>
                <input type="number" name="order" value="{{ old('order', $pricing->order) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
            <input type="text" name="description" value="{{ old('description', $pricing->description) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Özellikler</label>
            <div id="features-container" class="space-y-2">
                @foreach(($pricing->features ?? ['']) as $feature)
                <div class="flex gap-2">
                    <input type="text" name="features[]" value="{{ $feature }}" class="flex-1 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button" onclick="this.parentElement.remove()" class="bg-red-100 text-red-500 px-3 py-2 rounded-xl hover:bg-red-200 transition text-sm"><i class="fas fa-times"></i></button>
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addFeature()" class="mt-2 text-blue-600 text-sm hover:text-blue-700 flex items-center gap-1">
                <i class="fas fa-plus"></i> Özellik Ekle
            </button>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="featured" id="featured" {{ $pricing->featured ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded">
                <label for="featured" class="text-sm text-gray-700">Öne Çıkan</label>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="active" id="active" {{ $pricing->active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded">
                <label for="active" class="text-sm text-gray-700">Aktif</label>
            </div>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">Güncelle</button>
            <a href="{{ route('admin.pricing.index') }}" class="border border-gray-200 text-gray-600 hover:bg-gray-50 px-6 py-2.5 rounded-xl text-sm font-medium transition">İptal</a>
        </div>
    </form>
</div>
@push('scripts')
<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = '<input type="text" name="features[]" class="flex-1 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">' +
        '<button type="button" onclick="this.parentElement.remove()" class="bg-red-100 text-red-500 px-3 py-2 rounded-xl hover:bg-red-200 transition text-sm"><i class="fas fa-times"></i></button>';
    container.appendChild(div);
}
</script>
@endpush
@endsection
