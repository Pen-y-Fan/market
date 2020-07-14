@extends('layouts.app')
@section('main')
<form action="{{ route('markets.store') }}" method="post">
    @csrf
    <label for="name">Market Name</label>
    <input type="text" id="name"><br>
    <label for="city">Market City</label>
    <input type="text" id="city"><br>
    <label for="website">Market website</label>
    <input type="text" id="website"><br>
    <button type="submit">Create</button>
</form>
@endsection
