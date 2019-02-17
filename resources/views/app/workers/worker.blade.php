@extends('layouts.master')

@section('content')
    {{ $worker->name}}
    {{ $worker->phone}}
    {{ $worker->email}}
    <a href="/worker/{{$worker->id }}/edit">Edit</a>
    
    <form action="/worker/{{ $worker->id }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
@endsection