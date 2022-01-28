@extends('layouts.admin')


@section('content')

<h1>Create a new Post</h1>

@include('partials.errors')

<form action="{{route('admin.posts.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is_invalid @enderror" placeholder="title here" aria-describedby="titleHelper" value="{{old('title')}}">
        <small id="titleHelper" class="text-muted">Add your post title, max 200 characters</small>
    </div>
    <div class="mb-3">
        <label for="sub_title" class="form-label">Sub title</label>
        <input type="text" name="sub_title" id="sub_title" class="form-control @error('sub_title') is_invalid @enderror" placeholder="sub title here" aria-describedby="sub_titleHelper" value="{{old('sub_title')}}">
        <small id="sub_titleHelper" class="text-muted">Add your post sub title max 255 characters</small>
    </div>
    <div class="mb-3">
        <label for="cover" class="form-label">Cover Image URL</label>
        <input type="text" name="cover" id="cover" class="form-control @error('cover') is_invalid @enderror" placeholder="https://" aria-describedby="coverHelper" value="{{old('cover')}}">
        <small id="coverHelper" class="text-muted">Add your post cover image here, max 255 characters</small>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-control @error('category_id') is_invalid @enderror" name="category_id" id="category_id">
            <option value="" selected>Select a category</option>

            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags[]" id="tags">
            <option disabled>Select all tags</option>

            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control @error('body') is_invalid @enderror" name="body" id="body" rows="5">{{old('body')}}</textarea>
    </div>

    <button type="submit" class="btn btn-dark">Add Post</button>

</form>

@stop
