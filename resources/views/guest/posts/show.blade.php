@extends('layouts.app')


@section('content')
<div class="container">
    <img class="img-fluid" src="{{$post->cover}}" alt="{{$post->title}}">


    @auth
    <div class="actions">
        <a href="#">Back to Admin</a>
    </div>
    @endauth
    <h1 class="card-title">{{ $post->title }}</h1>
    <h4 class="card-title">{{$post->sub_title}}</h4>
    <div class="metadata">
        <div class="category">

            Category: {{ $post->category != null ? $post->category->name : 'Uncategorized'}}
        </div>
    </div>
    <div class="content">
        <p>
            {{$post->body}}
        </p>
    </div>
</div>
@endsection
