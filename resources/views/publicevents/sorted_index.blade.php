@extends('template_welcome')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


@section('admin')
    @if(session()->has('user'))
    @if(session('role') == 2 || session('role') == 4)
    <a class="show_admin" href="/adminevents">Administration </a>
    @endif
    @endif
@endsection

@section('bootstrap')
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--bootstrap css-->

    <!--bootstrap popper and js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--bootstrap popper and js-->
@endsection

@section('ajax')
    <script src="/js/research.js"></script>
    <script src="/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>

@endsection

@section('search_bar')


    {{--<form class="form-inline my-2 my-lg-0">
        <input id="events" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>--}}

    <form autocomplete="off" action="/publicevents" class="form-inline my-2 my-lg-0">
        <div class="autocomplete" style="width:300px;">
            <input id="events" type="text" name="eventName" placeholder="Rechercher un évènnement">
        </div>
        <input type="submit">
    </form>

    <style>
        * { box-sizing: border-box; }
        body {
            font: 16px Arial;
        }
        .autocomplete {
            /*the container must be positioned relative:*/
            position: relative;
            display: inline-block;
        }
        input {
            border: 1px solid transparent;
            background-color: #f1f1f1;
            padding: 10px;
            font-size: 16px;
        }
        input[type=text] {
            background-color: #f1f1f1;
            width: 100%;
        }
        input[type=submit] {
            background-color: DodgerBlue;
            color: #fff;
        }
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }
        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div:hover {
            /*when hovering an item:*/
            background-color: #e9e9e9;
        }
        .autocomplete-active {
            /*when navigating through the items using the arrow keys:*/
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>

@endsection

@section('sort')
    <div>
        <p>Trier les évènnements :</p>
        <form action="/publicevents">
            <input type="radio" id="category" name="sort" value="0">
            <label for="month_events">Catégorie</label>

            <input type="radio" id="price" name="sort" value="1">
            <label for="past_events">Prix croissant</label>

            <input type="radio" id="date" name="sort" value="2">
            <label for="past_events">Prix décroissant</label>

            <input type="submit" class="show">
        </form>
    </div>
@endsection

@section('content')
    <aside class="welcome">

        <img class="welcome_img" src="/img/fond_events.jpg" alt="Events">
        <h1 class="welcome_t"> PARTICIPEZ À NOS ÉVÈNEMENTS ! </h1>

    </aside>

    <hr class="blue_bar">
    <article class="events">
        <h2 class="t1"> Évènements du mois </h2>
        <p class="t2"> Inscrivez-vous à nos évènements du moment !</p>

        @foreach($events as $event)
        @if(!$event->hidden)
        @include('publicevents.index_event', ['event' => $event])
        @endif
        @endforeach
    </article>
@endsection
