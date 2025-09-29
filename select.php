<?php
require "database.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $phone_number=$_POST["phone_number"];
    $pass_word=$_POST["pass_word"];
    $selection=$pdo->prepare("SELECT* FROM infos WHERE phone_number=? AND pass_word=?");
    $selection->execute([$phone_number,$pass_word]);
$infos = $selection->fetch();
if ($infos){
   header("Location: home.html");
        exit();
} else {
    echo "Téléphone ou mot de passe incorrect.";
}
}
?>