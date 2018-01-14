@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <br/>
    <br/>
    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li>{{ $user->name }}, ({{ $user->email }})</li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
@endsection

@section('sidebar')
    @parent
@endsection