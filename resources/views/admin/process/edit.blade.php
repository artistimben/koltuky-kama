@extends('layouts.admin')
@section('title', 'Süreç Adımı Düzenle')
@section('page-title', 'Süreç Adımı Düzenle')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.process.update', $process) }}" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adım No *</label>
                <input type="number" name="step_number" value="{{ old('step_number', $process->step_number) }}" required min="1" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sıra No</label>
                <input type="number" name="order" value="{{ old('order', $process->order) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Başlık *</label>
            <input type="text" name="title" value="{{ old('title', $process->title) }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Açıklama *</label>
            <textarea name="description" rows="3" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ old('description', $process->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">İkon</label>
            <input type="text" name="icon" value="{{ old('icon', $process->icon) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="active" id="active" {{ $process->active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded">
            <label for="active" class="text-sm text-gray-700">Aktif</label>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">Güncelle</button>
            <a href="{{ route('admin.process.index') }}" class="border border-gray-200 text-gray-600 hover:bg-gray-50 px-6 py-2.5 rounded-xl text-sm font-medium transition">İptal</a>
        </div>
    </form>
</div>
@endsection
