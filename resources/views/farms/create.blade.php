@extends('layouts.app')
@section('main')
<form action="{{ route('farms.store') }}" method="post">
    @csrf
    <label for="name">Farm Name</label>
    <input type="text" id="name" name="name"><br>
    <label for="city">Farm City</label>
    <input type="text" id="city" name="city"><br>
    <label for="website">Farm website</label>
    <input type="text" id="website" name="website"><br>
    <button type="submit">Create</button>
</form>
@endsection
