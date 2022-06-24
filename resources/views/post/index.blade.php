@extends('layouts.app')

@section('title','Article Page')

@section('content')
<div class="mx-auto mt-5 mb-5" style="width: 800px;">
    <h2>บทความทั้งหมด </h2><a href="{{ url('/posts/create')}}" class="btn btn-primary">+ New Post</a>
    <br>
    <br>
    @foreach($posts as $post)
    <div class="row mb-2">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img src='{{ url("/images/posts/$post->post_image")}}' alt="post image" width="100%">
                    </div>
                    <div class="col-9">
                        <h5 class="card-title"><b>{{$post->post_name}}</b></h5>
                        <hr>
                        <p class="card-text">{{$post->post_content}}</p>
                        <p class="card-text">{{$post->created_at->diffForHumans()}}</p>
                        <p class="card-text">by {{$post->user->first_name}} {{$post->user->last_name}}</p>
                        <div style="text-align:right">
                            <form action='{{url("/posts/$post->id")}}' method="post">
                                <a href='{{url("/posts/$post->id/edit")}}' class="btn btn-primary">Edit</a>
                                @method("DELETE")
                                @csrf
                                <button type="submit" onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection