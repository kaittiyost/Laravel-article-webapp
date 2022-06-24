@extends('layouts.app')

@section('title','Profile Page')

@section('content')
<div class="mx-auto mt-5" style="width: 800px;">
<center>
<img src="https://cdn-icons-png.flaticon.com/512/4193/4193358.png" alt="" srcset="" width="300px">
</center>
    <h2>Hello :) {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</h2>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ชื่อ นามสกุล</th>
                <th>Email</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{$user->first_name}} {{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="" class="btn btn-warning">Edit</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection