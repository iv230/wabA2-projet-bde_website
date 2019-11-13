@extends('template')

@section('content')

    <form method="POST" action="/users/connect">
        {{ csrf_field() }}<br/>
        {!! $errors->first('email', '<small>:message</small>') !!}<br/>
        <input type="email" name="email" placeholder="Email"/><br/>
        {!! $errors->first('passwordHash', '<small>:message</small>') !!}<br/>
        <input type="password" name="passwordHash" placeholder="Mot de passe"/><br/>
        <br/>
        <input type="submit" value="Se connecter"/>
    </form>

    <a href="/users" type="button">En fait j'ai trop peur j'abandonne</a>

@endsection
