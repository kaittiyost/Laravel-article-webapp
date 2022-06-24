@extends('layouts.app')

@section('title','Article Create Page')

@section('content')
<div class="mx-auto mt-5 mb-5" style="width: 800px;">
    <h2>Create new post.</h2>
    <form method="post" action="{{url('/posts')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="post_name" class="form-label">Post name</label>
            <input type="text" class="form-control" name="post_name" required>
            @if($errors->has('post_name'))
                <span class="text-danger">{{$errors->first('post_name')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Content</label>
            <textarea type="text" rows="5" class="form-control" name="post_content" required></textarea>
            @if($errors->has('post_content'))
                <span class="text-danger">{{$errors->first('post_content')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="post_image" class="form-label">Post image</label>
            <input type="file" class="form-control" name="post_image" accept="image/*" required>
            @if($errors->has('post_image'))
                <span class="text-danger">{{$errors->first('post_image')}}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Post</button>
    </form>
    <center>
        <img src="https://cdn-icons-png.flaticon.com/512/4193/4193247.png" alt="" srcset="" width="300px">
    </center>
</div>
@endsection