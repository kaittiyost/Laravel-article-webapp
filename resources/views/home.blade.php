@extends('layouts.app')

@section('title','Home Page')

@section('content')
<div class="mx-auto mt-5" style="width: 800px;">
<center>
<img src="https://cdn-icons-png.flaticon.com/512/4193/4193375.png" alt="" srcset="" width="300px">
</center>
    <h2>Hello :) {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</h2>
</div>
@endsection