@extends('template')

@section('content')

    <h1>Liste des utilisateurs</h1>

    @if(session()->has('user'))
        <p>Bienvenue, <a href="/users/{{ session('user') }}">{{ session('username') }}</a>. Ton ID : {{ session('user') }}. Ton rôle : {{ session('role') }}.</p>
        <a href="/logout" type="button">Déconnexion</a>
    @else
        <a href="/users/create" type="button">Inscription</a><br/>
        <a href="/login" type="button">Connexion</a><br/>
    @endif

    @foreach($users as $user)

        <hr/>
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->email  }}</p>
        <ul>
            <li>Centre: {{ $user->school }}</li>
            <li>Role: {{ $user->role }}</li>
        </ul>

        <a href="/users/{{ $user->id }}" type="button">Détails</a><br/>
        @if(session()->has('user'))
            @if(session('user') == $user->id)

                <a href="/users/{{ $user->id }}/edit" type="button">Modifier</a><br/>
                <form method="POST" action="/users/{{ $user->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Supprimer l'utilisateur"/>
                </form>

            @endif
        @endif

    @endforeach

@endsection
