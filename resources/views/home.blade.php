@extends('master')
@section('title','Homepage')


@section('title_page')
Home Page
@endsection

@section('content')
<h1>Home Page</h1>
<div style="text-align:right">
<a href="{{route('member.register')}}"><label for="">Register</label></a>
</div>

@endsection

