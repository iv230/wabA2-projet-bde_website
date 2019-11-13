@extends('template')

@section('content')

    <form method="POST" action="/users/{{ $user->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <br/>
        {!! $errors->first('name', '<small>:message</small>') !!}<br/>
        <input type="text" name="name" placeholder="Nom d'utilisateur" value="{{ $user->name }}"/><br/>
        <select name="school">
            <option value="1" {{ $user->school == '1' ? 'selected' : ''  }}>Lille</option>
            <option value="2" {{ $user->school == '2' ? 'selected' : ''  }}>Arras</option>
            <option value="3" {{ $user->school == '3' ? 'selected' : ''  }}>Brest</option>
        </select>
        <br/>
        <input type="submit" value="Je me modifie !"/>
    </form>

    <a href="/users" type="button">En fait j'ai trop peur j'abandonne</a>

@endsection
