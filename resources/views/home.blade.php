@extends('layout')

@section('content')
<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h6 class="cart-title">Price: {{ "{$product->price} {$product->currency}"}}</h6>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mt-3">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick='document.getElementById("{{ "{$product->title}{$product->id}" }}").submit()'>Delete</button>
                    <form
                        action="{{route('product.destroy', $product->id)}}"
                        id="{{ "{$product->title}{$product->id}" }}"
                        method="post"
                    >
                    @csrf
                    @method('DELETE')
                    </form>

                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route("product.edit", $product->id) }}" >Edit</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
