@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Produk EN -->
        <div class="mb-3">
            <label for="name_en" class="form-label">Nama Produk (EN)</label>
            <input type="text" name="name[en]" class="form-control" id="name_en" value="{{ old('name.en', $product->name['en'] ?? '') }}">
        </div>

        <!-- Nama Produk ID -->
        <div class="mb-3">
            <label for="name_id" class="form-label">Nama Produk (ID)</label>
            <input type="text" name="name[id]" class="form-control" id="name_id" value="{{ old('name.id', $product->name['id'] ?? '') }}">
        </div>

        <!-- HS Code -->
        <div class="mb-3">
            <label for="hs_code" class="form-label">HS Code</label>
            <input type="text" name="hs_code" class="form-control" id="hs_code" value="{{ old('hs_code', $product->hs_code) }}">
        </div>

        <!-- CAS Number -->
        <div class="mb-3">
            <label for="cas_number" class="form-label">CAS Number</label>
            <input type="text" name="cas_number" class="form-control" id="cas_number" value="{{ old('cas_number', $product->cas_number) }}">
        </div>

        <!-- Gambar -->
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk (opsional)</label><br>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Image" width="100" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" id="image">
        </div>

        <!-- Deskripsi EN -->
        <div class="mb-3">
            <label for="description_en" class="form-label">Deskripsi (EN)</label>
            <textarea name="description[en]" class="form-control" rows="3">{{ old('description.en', $product->description['en'] ?? '') }}</textarea>
        </div>

        <!-- Deskripsi ID -->
        <div class="mb-3">
            <label for="description_id" class="form-label">Deskripsi (ID)</label>
            <textarea name="description[id]" class="form-control" rows="3">{{ old('description.id', $product->description['id'] ?? '') }}</textarea>
        </div>

        <!-- Aplikasi EN -->
        <div class="mb-3">
            <label for="application_en" class="form-label">Aplikasi (EN)</label>
            <textarea name="application[en]" class="form-control" rows="3">{{ old('application.en', $product->application['en'] ?? '') }}</textarea>
        </div>

        <!-- Aplikasi ID -->
        <div class="mb-3">
            <label for="application_id" class="form-label">Aplikasi (ID)</label>
            <textarea name="application[id]" class="form-control" rows="3">{{ old('application.id', $product->application['id'] ?? '') }}</textarea>
        </div>

        <!-- SEO Meta -->
        <div class="mb-3">
            <label for="meta_title_en" class="form-label">Meta Title (EN)</label>
            <input type="text" name="meta_title[en]" class="form-control" value="{{ old('meta_title.en', $product->meta_title['en'] ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="meta_title_id" class="form-label">Meta Title (ID)</label>
            <input type="text" name="meta_title[id]" class="form-control" value="{{ old('meta_title.id', $product->meta_title['id'] ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="meta_keyword_en" class="form-label">Meta Keyword (EN)</label>
            <input type="text" name="meta_keyword[en]" class="form-control" value="{{ old('meta_keyword.en', $product->meta_keyword['en'] ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="meta_keyword_id" class="form-label">Meta Keyword (ID)</label>
            <input type="text" name="meta_keyword[id]" class="form-control" value="{{ old('meta_keyword.id', $product->meta_keyword['id'] ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="meta_description_en" class="form-label">Meta Description (EN)</label>
            <textarea name="meta_description[en]" class="form-control" rows="2">{{ old('meta_description.en', $product->meta_description['en'] ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="meta_description_id" class="form-label">Meta Description (ID)</label>
            <textarea name="meta_description[id]" class="form-control" rows="2">{{ old('meta_description.id', $product->meta_description['id'] ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
