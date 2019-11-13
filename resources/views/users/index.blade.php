@extends('template')

@section('content')

    <h1>Liste des utilisateurs utilisés à des fins d'utilisation utile</h1>

    @if(session()->has('user'))
        <p>Bienvenue, <a href="/users/{{ session('user') }}">{{ session('username') }}</a></p>
        <a href="/logout" type="button">Je rentre à ma maison</a>
    @else
        <a href="/users/create" type="button">Je veux faire partie de cette aventure tumultueuse et semée d'embûches !</a><br/>
        <a href="/login" type="button">Je suis un aventurier et je veux me faire entendre !</a><br/>
    @endif

    @foreach($users as $user)

        <hr/>
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->email  }}</p>
        <ul>
            <li>Centre: {{ $user->school }}</li>
            <li>Role: {{ $user->role }}</li>
        </ul>

        <a href="/users/{{ $user->id }}" type="button">En savoir plus</a><br/>
        @if(session()->has('user'))
            @if(session('user') == $user->id)

                <a href="/users/{{ $user->id }}/edit" type="button">Modifier</a><br/>
                <form method="POST" action="/users/{{ $user->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Supprimer de l'espace intersidéral"/>
                </form>

            @endif
        @endif

    @endforeach

@endsection
