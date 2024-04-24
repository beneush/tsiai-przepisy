<?php

if (!isset($_GET['id'])) {
    header("Location: index.php");
    die();
}
$recipeID = $_GET['id'];

$server = "localhost";
$username = "root";
$password = "";
$dbname = "przepisomat";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "SELECT * FROM recipes WHERE ID='$recipeID';";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    header("Location: index.php");
    die();
}

$row = $result->fetch_assoc();

$recipeName= $row["name"];
$recipeIngredientsString = $row["ingredients"];
$recipeIngredients = explode("\n", $recipeIngredientsString);
$recipeHowToMake = $row['how_to_make'];
$iconPath = './assets/img/icons/' . $row["ID"] . '.png';
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Przepisomat :: Szczegóły Przepisu</title>
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

        <div class="recipe-name">
            <?php echo "<h2>$recipeName</h2>"?>
        </div>

        <div class="recipe-info">
            <div class="ingredients">
                <h3>Składniki:</h3>
                <ol>
                    <?php
                    foreach ($recipeIngredients as $item) {
                        echo "<li>$item</li>";
                    }
                    ?>
                </ol>
            </div>

            <div class="how-to-make">
                <h3>Jak Zrobić:</h3>
                <?php echo "<p>$recipeHowToMake</p>"?>
            </div>

            <div class="image">
                <?php
                if (file_exists($iconPath)) {
                    echo '<img src="' . $iconPath . '" alt="Ikona">';
                } else {
                    echo '<img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">';
                }
                ?>
            </div>
        </div>
    </body>
</html>

<?php
$conn->close()
?>
