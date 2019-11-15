@extends('template')

@section('content')

    <form method="POST" action="/users/connect">
        {{ csrf_field() }}
        {!! $errors->first('email', '<small>:message</small><br/>') !!}
        <input type="email" name="email" placeholder="Email"/><br/>
        {!! $errors->first('passwordHash', '<small>:message</small><br/>') !!}
        <input type="password" name="passwordHash" placeholder="Mot de passe"/><br/>
        {!! $errors->first('password', '<small>:message</small><br/>') !!}
        <input type="submit" value="Se connecter"/>
    </form>

    <a href="/users" type="button">Retour à l'index des utilisateurs</a>

@endsection
