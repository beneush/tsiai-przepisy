<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Przepisomat :: Dodawanie Przepisu</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="header-container">
            <div class="logo">
                <h1>Przepisomat</h1>
            </div>

            <div class="back-button">
                <a href="http://localhost/beneush/Przepisy/index.php"><button>Strona Główna</button></a>
            </div>
        </div>

        <div class="add-recipe">
                <form action="http://localhost/beneush/Przepisy/api/add-recipe.php" method="post">
                    <div class="form-group">
                        <label for="name">Nazwa:</label>
                        <input type="text" id="name" name="name" placeholder="Wpisz nazwę przepisu..." maxlength="42" required>
                    </div>
                    <div class="form-group">
                        <label for="icon">Ikona:</label>
                        <input class="icon-input" type="text" id="icon" name="icon" placeholder="Wprowadź Base64 obrazu..." contenteditable="true" required>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Składniki (Oddziel znakiem "(,)"): </label>
                        <input class="ingredients-input" type="text" id="ingredients" name="ingredients" placeholder="Wypisz składniki..." required>
                    </div>
                    <div class="form-group">
                        <label for="how-to-make">Jak zrobić:</label>
                        <input class="how-to-make-input" type="text" id="how-to-make" name="how-to-make" placeholder="Napisz jak przyrządzić przepis" required>
                    </div>

                    <button type="submit">Dodaj</button>
                </form>
            </div>
    </body>
</html>
