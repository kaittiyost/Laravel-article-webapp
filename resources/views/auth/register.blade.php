@extends('layouts.auth')

@section('title','Register Page')

@section('content')

<div class="mx-auto mt-5 mb-5" style="width: 800px;">
    <form method="post" action="{{ url('/auth/register') }}">
        @csrf
        <h1>Register To Website</h1>
        <div class="mb-3">
            <label for="first_name" class="form-label">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
            @if($errors->has('first_name'))
                <span class="text-danger">{{$errors->first('first_name')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
            @if($errors->has('last_name'))
                <span class="text-danger">{{$errors->first('last_name')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
            @if($errors->has('phone_number'))
                <span class="text-danger">{{$errors->first('phone_number')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Register</button>
    </form>
    <!-- 
    <center>
        <img src="https://cdn-icons-png.flaticon.com/512/4456/4456874.png" alt="" srcset="" width="300px">
    </center>
    -->
</div>
@endsection