@extends('layout')

@section('content')
<form action="{{ route("product.store") }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Product Title</label>
        <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ isset($product) ? $product->title : old('title') }}">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Product Description</label>
        <textarea class="form-control" name="description" placeholder="Enter Description" rows="3" >{{ isset($product) ? $product->description : old('description') }}</textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Product Price</label>
        <input type="decimal" class="form-control" name="price" placeholder="Enter Price" value="{{ isset($product) ? $product->price : old('price') }}">
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Select Currency</label>
        <select class="form-control" name="currency">
            <option {{ isset($product) && $product->currency == "GEL" ? 'SELECTED' : ''}}>GEL</option>
            <option {{ isset($product) && $product->currency == "USD" ? 'SELECTED' : ''}}>USD</option>
            <option {{ isset($product) && $product->currency == "EUR" ? 'SELECTED' : ''}}>EUR</option>
        </select>
    </div>
        <button type="submit" class="btn btn-primary mt-4">Publish Product</button>
</form>
@endsection
