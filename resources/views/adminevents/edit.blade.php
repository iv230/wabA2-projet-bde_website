@extends('template_welcome')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection

@section('edit_event')

<section class="creation">
    <h1 class="t1">Edition d'évènement</h1>


    <form class="create" action="/adminevents/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <div>
            <label class="label" for="name"> Nom :
                <input type="text" name="name" value="{{ $event-> name }}" placeholder="New name">
            </label>
        </div>

        <div>
            <label class="label" for="description"> Description :
                <textarea name="description" rows="10" cols="30" placeholder="New description">{{ $event-> description }}</textarea>
            </label>
        </div>

        <div>
            <label class="label" for=> Lieu :
                <input type="text" name="location" value="{{ $event-> location }}" placeholder="New location">
            </label>
        </div>

        <div>
            <label class="label" for=> Récurrence :
                <input type="text" name="recurrence" value="{{ $event-> recurrence }}" placeholder="New recurrence">
            </label>
        </div>

        <div>
            <label class="label" for=> Date :
                <input type="date" name="date_event" value="{{ $event-> date_event }}" placeholder="New date">
            </label>
        </div>

        <div>
            <label class="label" for=> Heure :
                <input type="time" name="time" value="{{ $event->time_event }}" placeholder="Heure de l'évènement">
            </label>
        </div>

        <div>
            <label class="label" for="Price"> Prix :
                <input type="number" name="price" value="{{ $event-> price}}" placeholder="New price">
            </label>
        </div>

        <div>
            <label class="label" for="number"> Etat :
                <input type="number" name="state" value="{{ $event-> state}}" min="0" max="1" placeholder="New state">
            </label>
        </div>

        <div>
            {!! $errors->first('photo', '<small>:message</small>') !!}
            <input type="file" name="photo">
        </div>

        <div class="choice">
            <button type="submit"> Enregistrer </button>
            <button href="/adminevents/{{$event->id}}"> Annuler </button>
        </div>

    </form>
</section>
@endsection
