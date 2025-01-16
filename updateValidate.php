<?php
session_start();

$erros = [];

$editar = $_GET['editar'];
$username = $_POST["Username"];
$email = $_POST["email"];
$password = $_POST["password"];

// //validar username
if (strlen($username) < 5) {
    $erros[] = "Username deve ter no mínimo 5 caracteres";
}

// //validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Email inválido";
}

// //validar senha
if (strlen($password) < 8) {
    $erros[] = "Senha deve ter no mínimo 8 caracteres";
}

if ($erros != null) {
    $_SESSION['feedback'] = $erros;
    header("location: updateUser.php?editar=$editar");
    exit();
}

$bd = file_get_contents("bd.json");
$bd = json_decode($bd);

$user = [
    "username" => $_POST["Username"],
    "email" => $_POST["email"],
    "password" => $_POST["password"]
];

$bd->users[$editar] = $user;
file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));
$_SESSION['sucess'] = "User att";

header('Location: listar.php ');

?>