<?php
session_start();
//Feedback erros
$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if ($feedback != false){
        foreach ($feedback as $value) {
            echo '*' . $value . '<br>';
        }
    }
    else{
        echo "Cliente cadastrado";
    }
    ?>

    <!-- nome, cpf, nascimento, endereço, createAt, updateAt -->
    <form method="post" action="validateCreate.php">
        <input type="text" placeholder="Nome de usuário" name="name" required><br>
        <input type="text" placeholder="CPF de usuário" name="cpf" required><br>
        <input type="text" placeholder="Endereço de usuário" name="endereco" required><br>
        <input type="submit" value="Enviar dados">
    </form>
</body>

</html>