@extends('layouts.master')

@section('content')
    {{ $truck->plate}}
    <a href="/truck/{{$truck->id }}/edit">Edit</a>
    
    <form action="/truck/{{ $truck->id }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
@endsection