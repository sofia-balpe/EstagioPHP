<?php

session_start();
include "../banco.php";
use App\banco;

$banco = new banco();


$erros = [];

$name = $_POST["name"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];

// //validando o nome:
if (strlen($name)<5) {
    $erros[] = "O nome deve ter no mínimo 5 caracteres";
}
// if(isset($banco->$clientesData->$name)){
//     $erros[] = "Já existe um usuário com este nome";
// }

// //validando o cpf:
if(strlen($cpf)!= 11 ) {
    $erros[] = "CPF inválido (menos de 11 caracteres)";
}

// if(!preg_match("'/([0-9])\1{10}/'", $cpf)){ //o preg_martch é usado para que a string siga as regras
// $erros[] = "CPF inválido";
// }

// //Validando o endereço:
if(!preg_match("'[a-z]'", $endereco)){
    $erros[] = "Endereço não pode conter caracteres especiais";
}

//Validando os erros:
if ($erros != null) {
    
    $_SESSION['feedback'] = $erros;
    header("location: createUser.php");
    exit();
}

$banco->createClientes($name, $cpf, $endereco);
header('location: createUser.php');
?> 