@extends('layouts.master')

@section('content')
    {{ $subcontractor->name}}
    {{ $subcontractor->phone}}
    {{ $subcontractor->email}}
    <a href="/subcontractor/{{$subcontractor->id }}/edit">Edit</a>
    
    <form action="/subcontractor/{{ $subcontractor->id }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
@endsection