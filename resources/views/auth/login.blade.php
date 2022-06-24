@extends('layouts.auth')

@section('title','Login Page')

@section('content')
<div class="mx-auto mt-5" style="width: 800px;">
    <form method="post" action="{{ url('/auth/login') }}">
    @csrf
        <h1>Login To Website</h1>
        @if($errors->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{$errors->first('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Login</button>
    </form>
    <img src="https://cdn-icons-png.flaticon.com/512/4456/4456885.png" alt="" srcset="" width="300px">
</div>
@endsection