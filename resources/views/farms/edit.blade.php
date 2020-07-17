@extends('layouts.app')
@section('main')
<form action="{{ route('farms.store') }}" method="post">
    @method('PATCH')
    @csrf
    <label for="name">Farm Name</label>
    <input type="text" id="name" name="name"><br>
    <label for="city">Farm City</label>
    <input type="text" id="city" name="city"><br>
    <label for="website">Farm website</label>
    <input type="text" id="website" name="website"><br>
    @foreach($markets as $id => $market)
        <div>
            <label for="{{ $market }}">
                <input
                    type="checkbox"
                    name="markets[]"
                    value="{{ $id }}"
                    {{ $farm->$markets()->allRelatedIds()->contains($id) ? "checked" : "" }}
                >
                {{ $market }}
            </label>
        </div>
    @endforeach
    <button type="submit">Create</button>
</form>
@endsection
