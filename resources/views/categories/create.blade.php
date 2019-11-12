<!DOCTYPE html>
<html>
    <head>
        <title>Créer une catégorie</title>
    </head>
    <body>
        <h1>Créer une catégorie</h1>
        <form action="/categories" method="POST" class="form-beau" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nom</label>
                <input type="text" name="name" placeholder="Nom de la catégorie"/>
            </div>
            <button type="submit">Ajouter</button>
            {{ csrf_field() }}
        </form>
    </body>
</html>