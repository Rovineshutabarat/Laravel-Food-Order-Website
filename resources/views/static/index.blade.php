@extends('layouts.static')

@section('pages')
    <x-static.navbar />
    <div class="mt-20">
        <h1>Homepage</h1>
        <a href="{{ route('auth.logout') }}">Logout</a>
    </div>
@endsection
