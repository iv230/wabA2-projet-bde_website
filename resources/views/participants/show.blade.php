<!DOCTYPE html>
<html>
  <head>
      <title>Event {{ $participant->id_event }}</title>
  </head>
  <body>
    <h1>Participants Event: {{ $participant->id_event }}</h1>
    <div id="content">
        <table class="table table-striped">
            <colgroup>
                <col width="30%">
                <col width="90%">
            </colgroup>
            <thead>
            <tr class='warning'>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
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
