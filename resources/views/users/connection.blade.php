@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection

@section('content')

<section class="creation">
    <h1 class="t1">Connexion</h1>
    <form method="POST" action="/users/connect">
        {{ csrf_field() }}
        {!! $errors->first('email', '<small>:message</small><br />') !!}
        <input type="email" name="email" placeholder="Email" /><br />
        {!! $errors->first('passwordHash', '<small>:message</small><br />') !!}
        <input type="password" name="passwordHash" placeholder="Mot de passe" /><br />

        <div class="choice">
            {!! $errors->first('password', '<small>:message</small><br />') !!}
            <button href="/users" type="submit"> Se connecter</button>
            <button href="/users" type="button">Annuler</button>
        </div>
    </form>


</section>
@endsection