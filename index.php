<?php
session_start();
$erros = [];
$password = $_POST["password"];
$username = $_POST["Username"];
$email = $_POST["email"];



//validar username
if (strlen($username) < 5) {
    $erros[] = "Username deve ter no mínimo 5 caracteres";
}

//validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Email inválido";
}

//validar senha
if (strlen($password) < 8) {
    $erros[] = "Senha deve ter no mínimo 8 caracteres";
}

if ($erros != null) {
    $_SESSION['feedback'] = $erros;
    header("location: user.php");
    exit();
}

//var_dump("Passou do ifs");


$bd = file_get_contents("bd.json");
$bd = json_decode($bd);

$users = [
    "username" => $username,
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT, ['cost' => 10])
];

$bd->users[] = $users;

file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));
$_SESSION['sucess'] = "User created";

header('Location: user.php ');




