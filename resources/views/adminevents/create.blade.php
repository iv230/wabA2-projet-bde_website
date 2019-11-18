@extends('template_welcome')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}" />
@endsection

@section('create_event')
    <section class="creation">
    <h1 class="t1">Création d'un évènement</h1>


  <form class="create" action="/adminevents" method="POST" enctype="multipart/form-data">
  @csrf

    <div>
        {!! $errors->first('name', '<small>:message</small>') !!}
        <input type="text" name="name" placeholder="Nom">
    </div>

    <div>
        {!! $errors->first('description', '<small>:message</small>') !!}
        <textarea name="description" rows="10" cols="30" placeholder="Description"></textarea>
    </div>

    <div>
        {!! $errors->first('location', '<small>:message</small>') !!}
        <input type="text" name="location" placeholder="Lieu">
    </div>

    <div>
        {!! $errors->first('recurrence', '<small>:message</small>') !!}
        <input type="text" name="recurrence" placeholder="Recurrence si oui">
    </div>

    <div>
        {!! $errors->first('date_event', '<small>:message</small>') !!}
        <input type="date" name="date_event" placeholder="Date">
    </div>

      <div>
          {!! $errors->first('time', '<small>:message</small>') !!}
          <input type="time" name="time" placeholder="Heure de l'évènement">
      </div>

    <div>
        {!! $errors->first('price', '<small>:message</small>') !!}
        <input type="number" name="price" placeholder="Prix">
    </div>

    <div>
        {!! $errors->first('photo', '<small>:message</small>') !!}
        <input type="file" name="photo">
    </div>

    <div>
      <button type="submit"> Ajouter </button>
    </div>

  </form>
</section>
@endsection

