<?php
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name   = trim($_POST["last_name"]);
    $first_name  = trim($_POST["first_name"]);
    $phone_number = trim($_POST["phone_number"]);
    $pass_word   = trim($_POST["pass_word"]);
    $email       = trim($_POST["email"]);
    if (empty($last_name) || empty($first_name) || empty($phone_number) || empty($pass_word) || empty($email)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        $insert = $pdo->prepare("INSERT INTO infos (last_name, first_name, phone_number, pass_word, email) VALUES (?, ?, ?, ?, ?)");
        $resultat = $insert->execute([$last_name, $first_name, $phone_number, $pass_word, $email]);

        if ($resultat) {
            echo "Vous avez été bien enregistré";
        } else {
            echo "Échec de l'enregistrement";
        }
    }
}
?>