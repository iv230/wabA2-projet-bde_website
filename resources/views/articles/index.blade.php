@extends('template_welcome')

@section('index_scss')
    <link rel="stylesheet" href="{{ asset('css/index_shop.css') }}" />
@endsection

@section('admin')
    <a class="show_admin" href="/adminevents">Administration </a>
@endsection


@section('welcome_shop')

    <aside class="welcome">

        <img class="welcome_img" src="/img/fond_shop.jpg" alt="Events">
        <h1 class="welcome_t"> BIENVENUE SUR NOTRE BOUTIQUE ! </h1>

    </aside>

@endsection
