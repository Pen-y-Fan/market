@extends('layouts.app')
@section('main')
    <h1>{{ $farm->name }}</h1>
    <ul>
        <li>Location City: {{ $farm->name }}</li>
        <li>Website: {{ $farm->website }}</li>
    </ul>
@endsection
