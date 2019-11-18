<!DOCTYPE html>
<html>
  <head>
      <title>Partiticpants à {{ $event->name }}</title>
  </head>
  <body>
    <h1>Participants :</h1>
    <div id="content">
        <p>Nom de l'évènement : {{ $event->name }}</p>
        <p>Lieu : {{ $event->location }}</p>
        <p>Date et heure : {{ $event->date_event }} à {{ $event->time_event }}</p>

        <table class="table table-striped">
            <colgroup>
                <col width="30%">
                <col width="90%">
            </colgroup>
            <thead>
            <tr class='warning'>
                <th>User Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($participants as $participant)
            <tr>
                <td>{{ $participant->user()->name }}</td>
                <td>{{ $participant->user()->email }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="elementH"></div>

    <button onclick="convert_HTML_To_PDF();">Convert to PDF</button>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script src="/js/jspdf.debug.js" charset="utf-8"></script>
  </body>
</html>
