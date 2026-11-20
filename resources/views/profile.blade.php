@extends('layouts.site')

@section('title', 'Profile')
@section('heading', 'Profile')

@section('content')
<div class="content box">
    <h2>{{ $user->full_name }}</h2>
    <p>Username: {{ $user->username }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Created At: {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
</div>
@endsection