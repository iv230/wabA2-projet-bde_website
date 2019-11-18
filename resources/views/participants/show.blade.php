<!DOCTYPE html>
<html>
  <head>
      <title>Event $id_event</title>
  </head>
  <body>
    <h1>Participants :</h1>
    <div id="content">
        <table class="table table-striped">
            <colgroup>
                <col width="30%">
                <col width="90%">
            </colgroup>
            <thead>
            <tr class='warning'>
                <th>ID User</th>
                <th>User Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($participants as $participant)
            <tr>
                <td>{{ $participant->id_user }}</td>
                <td>{{ $participant->user()->name }}</td>
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
