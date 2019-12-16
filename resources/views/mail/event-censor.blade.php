<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>BDE CESI Nice</h2>
    <p>L'évènement suivant a été masqué :</p>
    <ul>
        <li><strong>Nom</strong> : {{ $event->name }}</li>
        <li><strong>Lieu</strong> : {{ $event->location }}</li>
        <li><strong>Date</strong> : {{ $event->date_event }}</li>
    </ul>

    <p>L'utilisateur à la source du blocage est :</p>
    <ul>
        <li><strong>Nom</strong> : {{ $user->name }}</li>
        <li><strong>Email</strong> : {{ $user->email }}</li>
    </ul>
</body>
</html>
