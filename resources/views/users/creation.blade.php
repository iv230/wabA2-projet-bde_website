@extends('template_welcome')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection

@section('content')
    <section class="creation">

        <h1 class="t1">Inscription</h1>
    <form method="POST" action="/users">
        {{ csrf_field() }}<br/>

        {!! $errors->first('name', '<small>:message</small>') !!}<br/>
        <label class="label" for="text"> Nom d'utilisateur :
            <input type="text" name="name" placeholder="Nom d'utilisateur"/>
        </label><br/>

        {!! $errors->first('email', '<small>:message</small>') !!}<br/>
        <label class="label" for="text"> Email de l'école :
            <input type="email" name="email" placeholder="Email"/>
        </label><br/>

        {!! $errors->first('passwordHash', '<small>:message</small>') !!}<br/>
        <label class="label" for="text"> Mot de passe
            <input type="password" name="passwordHash" placeholder="Mot de passe :"/>
        </label><br/>

        {!! $errors->first('password_confirmed', '<small>:message</small>') !!}<br/>
        <label class="label" for="text"> Confirmation du mot de passe :
            <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe"/>
        </label><br/>
        <label class="label" for="text"> Centre :
            <select class="list"name="school">
                <option value="" selected disabled hidden>Choisissez votre centre</option>
                @foreach($schools as $school)
                <option value={{ $school->id }}>{{ $school->name }}</option>
                @endforeach
            </select>
        </label>
        <div class="choice">
        <button  type="submit" > S'inscrire </button>
        <button  href="/users" type="button">En fait j'ai trop peur j'abandonne</button>
        </div>
    </form>


    </section>

@endsection
