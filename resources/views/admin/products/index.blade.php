@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama (EN)</th>
                <th>HS Code</th>
                <th>CAS Number</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                
                <td>
    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="Image" width="50">
    @endif
    {{ $product->name['en'] ?? '-' }}
</td>
                <td>{{ $product->hs_code }}</td>
                <td>{{ $product->cas_number }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</button>
</form>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
