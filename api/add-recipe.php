<?php

$name = $_POST['name'];
$icon = $_POST['icon'];
$ingredients = $_POST['ingredients'];
$how_to_make = $_POST['how-to-make'];

$server = "localhost";
$username = "root";
$password = "";
$dbname = "przepisomat";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "INSERT INTO recipes(name, icon, ingredients, how_to_make) VALUES ('$name', '$icon', '$ingredients', '$how_to_make');";
$conn->query($sql);

$conn->close();