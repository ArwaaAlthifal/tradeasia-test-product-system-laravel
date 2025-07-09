@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-3 fs-4 fw-bold">Tambah Produk</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name[en]" class="form-control" placeholder="English" required>
            <input type="text" name="name[id]" class="form-control mt-1" placeholder="Bahasa Indonesia" required>
        </div>

        <div class="mb-3">
            <label>HS Code</label>
            <input type="text" name="hs_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>CAS Number</label>
            <input type="text" name="cas_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi Produk</label>
            <textarea name="description[en]" class="form-control" placeholder="Description (EN)"></textarea>
            <textarea name="description[id]" class="form-control mt-1" placeholder="Deskripsi (ID)"></textarea>
        </div>

        <div class="mb-3">
            <label>Aplikasi</label>
            <textarea name="application[en]" class="form-control" placeholder="Application (EN)"></textarea>
            <textarea name="application[id]" class="form-control mt-1" placeholder="Aplikasi (ID)"></textarea>
        </div>

        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title[en]" class="form-control" placeholder="Meta Title EN">
            <input type="text" name="meta_title[id]" class="form-control mt-1" placeholder="Meta Title ID">
        </div>

        <div class="mb-3">
            <label>Meta Keyword</label>
            <input type="text" name="meta_keyword[en]" class="form-control" placeholder="Meta Keyword EN">
            <input type="text" name="meta_keyword[id]" class="form-control mt-1" placeholder="Meta Keyword ID">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description[en]" class="form-control" placeholder="Meta Description EN"></textarea>
            <textarea name="meta_description[id]" class="form-control mt-1" placeholder="Meta Description ID"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Produk</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-success">Simpan Produk</button>
    </form>  
    </div>
@endsection