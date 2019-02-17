@extends('layouts.master')

@section('content')
    {{ $employee->name}}
    {{ $employee->phone}}
    {{ $employee->email}}
    <a href="/company/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
    <a href="/employee/{{$employee->id }}/edit">Edit</a>
    
    <form action="/employee/{{ $employee->id }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
@endsection