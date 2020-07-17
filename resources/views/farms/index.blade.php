@extends('layouts.app')
@section('main')
    <ul>
        @foreach($farms as $farm)
            <li>
                <a href="{{ route('farms.show', $farm) }}">
                    {{ $farm->name }}
                </a>
            </li>
        @endforeach
    </ul>
    {{ $farms->links() }}
@endsection
