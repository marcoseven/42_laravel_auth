@extends('layouts.app')


@section('content')
<div class="container">

    <div class="product d-flex">
        <img src="{{$product->image}}" alt="{{$product->name}}">

        <div class="details p-4">
            <h1 class="card-title">{{$product->name}}</h1>
            <p class="card-text">{{$product->price}}</p>
        </div>

    </div>


    @auth
    <div class="actions">
        <a href="{{route('admin.products.index')}}">Back to Admin</a>
    </div>
    @endauth
    <div class="content p-4">
        <p>
            {{$product->description}}
        </p>
    </div>
</div>
@endsection
