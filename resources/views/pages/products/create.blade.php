@extends('layouts.dafault');


@section('content')
    
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="" class="form-control-label">Nama Barang</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror "/>
                    
                    @error('name') <div class="text-muted">{{ $message }}</div>@enderror     
                </div>

                <div class="form-group">
                    <label for="" class="form-control-label">Tipe Barang</label>
                    <input type="text" name="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror "/>
                
                    @error('type') <div class="text-muted">{{ $message }}</div>@enderror 
                </div>

                <div class="form-group">
                    <label for="" class="form-control-label">Deskripsi Barang</label>
                    <textarea  name="description"  class="ckeditor form-control @error('description') is-invalid @enderror ">{{ old('description') }}</textarea>
                
                    @error('description') <div class="text-muted">{{ $message }}</div>@enderror 
                </div>

                <div class="form-group">
                    <label for="" class="form-control-label">Price</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror "/>
                
                    @error('price') <div class="text-muted">{{ $message }}</div>@enderror 
                </div>

                <div class="form-group">
                    <label for="" class="form-control-label">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror "/>
                
                    @error('quantity') <div class="text-muted">{{ $message }}</div>@enderror 
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>

@endsection