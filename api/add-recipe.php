<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "przepisomat";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['name'], $_POST['ingredients'], $_POST['how-to-make'], $_FILES['icon'])) {
        $name = $_POST['name'];
        $ingredients = $_POST['ingredients'];
        $how_to_make = $_POST['how-to-make'];
        $icon = $_FILES['icon'];

        // Upload Product Icon
        $targetDir = "../assets/img/icons/";
        $fileName = basename($icon["name"]);
        $targetFile = $targetDir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($icon["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only PNG files
        if ($imageFileType != "png") {
            echo "Sorry, only PNG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Insert product data into database using prepared statement to prevent SQL injection
            $sql = "INSERT INTO recipes(name, ingredients, how_to_make) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $ingredients, $how_to_make);

            if ($stmt->execute()) {
                // Retrieve the auto-incremented ID
                $last_id = $stmt->insert_id;

                // Rename file with product ID
                $newFileName = $targetDir . $last_id . ".png";

                // Move uploaded file to destination with new name
                if (move_uploaded_file($icon["tmp_name"], $newFileName)) {
                    echo "Dodano Produkt";
                } else {
                    echo "Wystąpił problem z plikiem";
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
        }
    } else {
        echo "Missing required fields.";
    }
}

$conn->close();