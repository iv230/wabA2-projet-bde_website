@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection

@section('content')
<section class="creation">

    <h1 class="t1">Inscription</h1>
    <form method="POST" action="/users">
        {{ csrf_field() }}<br />

        {!! $errors->first('name', '<small>:message</small>') !!}<br />
        <label class="label" > Nom d'utilisateur :
            <input type="text" name="name" placeholder="Nom d'utilisateur" />
        </label><br />

        {!! $errors->first('email', '<small>:message</small>') !!}<br />
        <label class="label" > Email de l'école :
            <input type="email" name="email" placeholder="Email" />
        </label><br />

        {!! $errors->first('passwordHash', '<small>:message</small>') !!}<br />
        <label class="label" > Mot de passe
            <input type="password" name="passwordHash" placeholder="Mot de passe :" />
        </label><br />

        {!! $errors->first('password_confirmed', '<small>:message</small>') !!}<br />
        <label class="label" > Confirmation du mot de passe :
            <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" />
        </label><br />

        {!! $errors->first('school', '<small>:message</small>') !!}<br />
        <label class="label" > Centre :
            <select class="list" name="school">
                <option value="" selected disabled hidden>Choisissez votre centre</option>
                @foreach($schools as $school)
                <option value={{ $school->id }}>{{ $school->name }}</option>
                @endforeach
            </select>
        </label>

        {!! $errors->first('legals', '<br/><small>Vous devea ccépter les conditions générales de ventes pour vous inscrire</small>') !!}<br />
        <label class="label" > J'accèpte les <a href="/cgv">conditions générales de ventes</a> et j'ai lu les <a href="/credits">mentions légales</a>.
            <input type="checkbox" name="legals">
        </label>

        <div class="choice">
            <button type="submit"> S'inscrire </button>
            <a class="show" href="/">En fait j'ai trop peur j'abandonne</a>
        </div>
    </form>


</section>

@endsection
