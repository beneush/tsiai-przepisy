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
                <a href="index.php"><button>Strona Główna</button></a>
            </div>
        </div>

        <div class="add-recipe">
            <form action="api/add-recipe.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nazwa:</label>
                    <input type="text" id="name" name="name" placeholder="Wpisz nazwę przepisu..." maxlength="42" required>
                </div>
                <div class="form-group">
                    <label for="icon">Ikona:</label>
                    <div class="addFileInput">
                        <input type="file" id="icon" name="icon" accept="image/png" required><br><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ingredients">Składniki (Oddziel enterem): </label>
                    <textarea class="ingredients-input" id="ingredients" name="ingredients" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="how-to-make">Jak zrobić:</label>
                    <textarea class="how-to-make-input" id="how-to-make" name="how-to-make" rows="5" required></textarea>
                </div>

                <button type="submit">Dodaj</button>
            </form>
        </div>
    </body>
</html>