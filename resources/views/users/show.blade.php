@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index_users.css') }}" />
@endsection

@section('content')

<article class="users">
    <h3>{{ $user->name }}</h3>
    <p>{{ $user->email }}</p>
    <ul>
        <li>Centre: {{ $user->school }}</li>
        <li>Role: {{ $user->role }}</li>
    </ul>

    <a href="/users" type="button">Retour à l'index</a>

    @if(session()->has('user'))
    @if(session('user') == $user->id)

    <a href="/users/{{ $user->id }}/edit" type="button">Modifier</a><br />
    <form method="POST" action="/users/{{ $user->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer l'utilisateur" />
    </form>
</article>

@endif
@endif

@endsection
