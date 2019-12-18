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

@section('ajax')

<script src="/js/research.js"></script>

@endsection

@section('search_bar')
<div class="block-search-bar">

    <form autocomplete="off" action="/publicevents" >
        <div class="autocomplete" style="width:300px;">
            <input id="events" type="text" name="eventName" placeholder="Rechercher un évènnement">
        </div>
        <input type="submit">
    </form>
</div>
@endsection

@section('sort')

    <div class="sort">
        <h3 class="title-sort">Trier les évènnements :</h3>
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

    @foreach($monthEvents as $event)
    @if(!$event->hidden)
    @include('publicevents.index_event', ['event' => $event])
    @endif
    @endforeach
</article>


<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements à venir</h2>
    <p class="t2"> Inscrivez-vous pour plus tard !</p>

    @foreach($nextEvents as $event)
    @if(!$event->hidden)
    @include('publicevents.index_event', ['event' => $event])
    @endif
    @endforeach
</article>


<hr class="blue_bar">
<article class="events">
    <h2 class="t1"> Évènements passés</h2>
    <p class="t2"> Commentez et ajoutez des photos !</p>

    @foreach($passedEvents as $event)
    @if(!$event->hidden)
    @include('publicevents.index_event', ['event' => $event])
    @endif
    @endforeach
</article>
@endsection
