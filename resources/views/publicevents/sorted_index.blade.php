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

@section('search_bar')

    <form autocomplete="off" action="/publicevents" >
        <div class="autocomplete" style="width:300px;">
            <input id="events" type="text" name="eventName" placeholder="Rechercher un évènnement">
        </div>
        <input type="submit">
    </form>

@endsection

@section('sort')

    <div class="sort">
        <p class="title-sort">Trier les évènnements :</p>
        <form action="/publicevents" class="list-sort">
        <div>
            <input type="radio" id="category" name="sort" value="0">
            <label for="month_events" class="title-sort">Catégorie</label>
        </div>
        <div>
            <input type="radio" id="price" name="sort" value="1">
            <label for="past_events" class="title-sort">Prix croissant</label>
        </div>
        <div>
            <input type="radio" id="date" name="sort" value="2">
            <label for="past_events" class="title-sort">Prix décroissant</label>
        </div>
            <input type="submit" class="validate">
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
