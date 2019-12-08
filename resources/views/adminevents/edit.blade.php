@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection

@section('content')

<section class="creation">
    <h1 class="t1">Edition d'évènement</h1>


    <form class="create" action="/adminevents/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <div>
            {!! $errors->first('name', '<small>:message</small>') !!}<br/>
            <label class="label"> Nom :
                <input type="text" name="name" value="{{ $event-> name }}" placeholder="New name">
            </label>
        </div>

        <div>
            {!! $errors->first('description', '<small>:message</small>') !!}<br/>
            <label class="label"> Description :
                <textarea name="description" rows="10" cols="30" placeholder="New description">{{ $event-> description }}</textarea>
            </label>
        </div>

        <div>
            {!! $errors->first('location', '<small>:message</small>') !!}<br/>
            <label class="label"> Lieu :
                <input type="text" name="location" value="{{ $event-> location }}" placeholder="New location">
            </label>
        </div>

        <div>
            {!! $errors->first('recurrence', '<small>:message</small>') !!}<br/>
            <label class="label"> Récurrence :
                <input type="text" name="recurrence" value="{{ $event-> recurrence }}" placeholder="New recurrence">
            </label>
        </div>

        <div>
            {!! $errors->first('date_event', '<small>:message</small>') !!}<br/>
            <label class="label"> Date :
                <input type="date" name="date_event" value="{{ $event-> date_event }}" placeholder="New date">
            </label>
        </div>

        <div>
            {!! $errors->first('time', '<small>:message</small>') !!}<br/>
            <label class="label"> Heure :
                <input type="time" name="time" value="{{ $event-> time_event }}" placeholder="New date">
            </label>
        </div>

        <div>
            {!! $errors->first('price', '<small>:message</small>') !!}<br/>
            <label class="label"> Prix :
                <input type="number" name="price" value="{{ $event-> price}}" placeholder="New price">
            </label>
        </div>

        <div>
            <input type="radio" id="month_events"
                   name="state" value="{{ $event-> state = 1}}" checked>
            <label for="month_events">Actuel</label>

            <input type="radio" id="past_events"
                   name="state" value="{{ $event-> state = 0}}">
            <label for="past_events">Passé</label>
        </div>

        <div>
            {!! $errors->first('photo', '<small>:message</small>') !!}
            <input type="file" name="photo">
        </div>

        <div class="choice">
            <button type="submit"> Enregistrer </button>
            <a class="show" href="/adminevents/{{$event->id}}"> Annuler </a>
        </div>

    </form>
</section>
@endsection
