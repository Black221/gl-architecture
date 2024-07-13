<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mglsi_news";

$connnexion = new PDO("mysql:host=localhost;dbname=mglsi_news", $username, $password);

$libelle = $_POST["libelle"];

$sql = "INSERT INTO categorie (libelle) VALUES (:libelle)";

$stmt = $connnexion->prepare($sql);
$stmt->bindParam(":libelle", $libelle);

$stmt->execute();

echo "good job";