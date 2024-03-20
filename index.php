<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "przepisomat";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "SELECT * FROM recipes;";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM recipes WHERE name LIKE \"%$search%\";";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Przepisomat</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="header-container">
            <div class="logo">
                <h1>Przepisomat</h1>
            </div>

            <div class="search-bar">
                <form action="index.php" method="get">
                    <input id="search" name="search" type="text" class="search-input" placeholder="Wyszukaj przepisu...">
                    <button type="submit" class="search-button">Szukaj</button>
                </form>
            </div>

            <div class="add-button">
                <a href="http://localhost/beneush/Przepisy/addRecipe.php"><button>Dodaj Przepis</button></a>
            </div>
        </div>

        <div class="recipe-container">
            <?php
            if (mysqli_num_rows($result) > 0) {
                // Output each recipe
                while ($row = mysqli_fetch_assoc($result)) {
                    $ID = $row["ID"];
                    $name = $row['name'];
                    $icon = $row['icon'];
                    $ingredients = $row['ingredients'];
                    $how_to_make = $row['how_to_make'];
            
                    // Generate HTML for the recipe
                    echo '<div class="recipe">';
                    // xd
                    echo "<a href=\"http://localhost/beneush/Przepisy/recipe.php?id=$ID\"><img src=\"$icon\" alt=\"Recipe Icon\"></a>";
                    echo "<h2>$name</h2>";
                    // You can include additional information like ingredients and how to make here
                    echo '</div>';
                }
            } else {
                echo "No recipes found.";
            }
            ?>
        </div>
    </body>
</html>

<?php
$conn->close()
?>
