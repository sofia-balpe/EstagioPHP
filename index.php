<?php
session_start();
$erros = [];
$password = $_POST["password"];
$username = $_POST["Username"];
$email = $_POST["email"];



//validar email
if (strlen($username) < 5) {
    // $_SESSION['feedback'] = "Senha deve ter no mínimo 8 caracteres";
    $erros[] = "Username deve ter no mínimo 5 caracteres";    
 }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //$_SESSION['feedback'] = "Email inválido";
    $erros[] = "Email inválido";
}
//validar senha
if (strlen($password) < 8) {
   // $_SESSION['feedback'] = "Senha deve ter no mínimo 8 caracteres";
   $erros[] = "Senha deve ter no mínimo 8 caracteres";    
}
//validar username

if ($erros != null) {
    $_SESSION['feedback'] = $erros;
    header("location: user.php");
    exit();
}
var_dump("Passou do ifs");

//Colocar mais campo
//Validar para mostrar todos os erros de uma vez (lista de erros array) $erros = []
//deixar o erro vermelho (estilizar);





