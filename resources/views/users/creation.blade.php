@extends('template')

@section('content')

    <form method="POST" action="/users">
        {{ csrf_field() }}<br/>

        {!! $errors->first('name', '<small>:message</small>') !!}<br/>
        <input type="text" name="name" placeholder="Nom d'utilisateur"/><br/>

        {!! $errors->first('email', '<small>:message</small>') !!}<br/>
        <input type="email" name="email" placeholder="Email"/><br/>

        {!! $errors->first('passwordHash', '<small>:message</small>') !!}<br/>
        <input type="password" name="passwordHash" placeholder="Mot de passe"/><br/>

        {!! $errors->first('password_confirmed', '<small>:message</small>') !!}<br/>
        <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe"/><br/>

        <select name="school">
            <option value="" selected disabled hidden>Choisissez votre centre</option>
            @foreach($schools as $school)
            <option value={{ $school->id }}>{{ $school->name }}</option>
            @endforeach
        </select>
        <br/>
        <input type="submit" value="S'inscrire"/>
    </form>

    <a href="/users" type="button">En fait j'ai trop peur j'abandonne</a>

@endsection
