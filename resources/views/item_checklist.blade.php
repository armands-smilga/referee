@extends('layout')
@section('content')
    <h1>Referee Checklist</h1>
    @foreach (auth() -> user() -> items as $item) <!-- loop through each item of the authenticated user -->
        <form method="POST" action="/items/update/{{ $item->id }}"> <!-- form for updating item-->
            @csrf
            <label for="item-{{$item->id}}">{{ $item->name }}</label>
            <input type="checkbox" id="item-{{ $item->id }}" name="is_available" value = "1" {{ $item -> is_available ? 'checked' : '' }}> <!-- checkbox required/optional -->
            <button type="submit"> Update </button>
        </form>
    @endforeach
@endsection