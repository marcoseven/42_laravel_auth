@extends('layouts.admin')


@section('content')

<h1>Create a new Product</h1>

@include('partials.errors')

<form action="{{route('admin.products.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Lenovo Laptop" aria-describedby="nameHelper" value="{{old('name')}}">
        <small id="nameHelper" class="text-muted">Type a name for your product</small>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" name="image" id="image" class="form-control" placeholder="https://" aria-describedby="imageHelper" value="{{old('image')}}>
        <small id=" imageHelper" class="text-muted">Type a image for your product</small>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="https://" aria-describedby="priceHelper" value="{{old('price')}}>
        <small id=" priceHelper" class="text-muted">Type a price for your product</small>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="qty" class="form-label">Qty</label>
        <input type="number" name="qty" id="qty" class="form-control" placeholder="https://" aria-describedby="qtyHelper" value="{{old('qty')}}>
        <small id=" qtyHelper" class="text-muted">Type a qty for your product</small>
        @error('qty')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="5">{{old('name')}}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-dark">Save</button>


</form>

@endsection
