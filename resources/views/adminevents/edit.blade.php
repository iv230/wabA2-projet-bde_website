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
            {!! $errors->first('name', '<small>:message</small>') !!}<br />
            <label class="label"> Nom :
                <input type="text" name="name" value="{{ $event-> name }}">
            </label>
        </div>

        <div>
            {!! $errors->first('description', '<small>:message</small>') !!}<br />
            <label class="label"> Description :
                <textarea name="description" rows="10" cols="30">{{ $event-> description }}</textarea>
            </label>
        </div>

        <div>
            {!! $errors->first('location', '<small>:message</small>') !!}<br />
            <label class="label"> Lieu :
                <input type="text" name="location" value="{{ $event-> location }}">
            </label>
        </div>

        <div>
            {!! $errors->first('recurrence', '<small>:message</small>') !!}<br />
            <label class="label"> Récurrence :
                <input type="text" name="recurrence" value="{{ $event-> recurrence }}">
            </label>
        </div>

        <div>
            {!! $errors->first('date_event', '<small>:message</small>') !!}<br />
            <label class="label"> Date :
                <input type="date" name="date_event" value="{{ $event-> date_event }}">
            </label>
        </div>

        <div>
            {!! $errors->first('time', '<small>:message</small>') !!}<br />
            <label class="label"> Heure :
                <input type="time" name="time" value="{{ $event-> time_event }}">
            </label>
        </div>

        <div>
            {!! $errors->first('price', '<small>:message</small>') !!}<br />
            <label class="label"> Prix :
                <input type="number" name="price" value="{{ $event-> price}}">
            </label>
        </div>

        <div>
            {!! $errors->first('state', '<small>:message</small>') !!}<br />
            <input type="radio" id="month_events" name="state" value="1" @if($event->state == 1) checked @endif>
            <label for="month_events">Actuel</label>

            <input type="radio" id="past_events" name="state" value="0" @if($event->state == 0) checked @endif>
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
