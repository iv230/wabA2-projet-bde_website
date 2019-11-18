@extends('trash.template')

@section('content')

<form method="POST" action="/users/{{ $user->id }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    {!! $errors->first('name', '<small>:message</small>') !!}<br />
    <input type="text" name="name" placeholder="Nom d'utilisateur" value="{{ $user->name }}" /><br />

    <select name="school" value="{{ $user->school }}">
        @foreach($schools as $school)
        <option value="{{ $school->id }}" {{ $user->school == $school->id ? ' selected' : '' }}>{{ $school->name }}</option>
        @endforeach
    </select>
    <br />
    <input type="submit" value="Je me modifie !" />
</form>

<a href="/users" type="button">Retour à l'index des utilisateurs</a>

@endsection
