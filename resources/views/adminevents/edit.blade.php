@extends('template_welcome')

@section('index_scss')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" />
@endsection

@section('edit_event')

    <section class="creation">
    <h1 class="t1">Edition d'évènement</h1>


  <form class="create" action="/adminevents/{{$event->id}}" method="POST" enctype="multipart/form-data">
  @csrf
  {{ method_field('PATCH') }}

    <div>
      <input type="text" name="name" value="{{ $event-> name }}" placeholder="New name">
    </div>

    <div>
      <textarea name="description" placeholder="New description">{{ $event-> description }}</textarea>
    </div>

    <div>
      <input type="text" name="location" value="{{ $event-> location }}" placeholder="New location">
    </div>

    <div>
      <input type="text" name="recurrence" value="{{ $event-> recurrence }}" placeholder="New recurrence">
    </div>

    <div>
      <input type="date" name="date_event" value="{{ $event-> date_event }}" placeholder="New date">
    </div>

    <div>
      <input type="number" name="price" value= "{{ $event-> price}}" placeholder="New price">
    </div>

    <div>
      <input type="number" name="state" value= "{{ $event-> state}}" min="0" max="1" placeholder="New state">
    </div>

      <div>
          {!! $errors->first('photo', '<small>:message</small>') !!}
          <input type="file" name="photo">
      </div>

    <div>
      <button type="submit"> Edit </button>
    </div>

  </form>
    </section>
@endsection
