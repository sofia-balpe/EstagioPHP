<?php
session_start();

//Chamar a classe do banco
include("banco.php");
use App\banco;
$banco = new banco();
$editar = $_GET['editar'];


$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

if ($banco->validarIndex($editar) == false) {
    $_SESSION['erro'] = "índice não existe";
    header('location: listar.php');
    exit();
}

$usersByIndex = $banco->getUserByIndex($editar);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>

<body>

    <!-- Mostrar erros -->
    <div id="divErros">
        <?php
        if ($feedback != false) {
            foreach ($feedback as $value) {
                echo '*' . $value . '<br>';
            }
        }
        ?>
    </div>


    <!--formulário para editar usuários-->
    <form action="updateValidate.php?editar=<?php echo $editar ?>" method="post" id="formUpdate">
        <h1 id="idh1">Atualizar dados</h1>

        <img src="iconUser.png" alt="imagem icon usuário">
        <input type="text" id="idUser" placeholder="Nome de usuário" name="Username" required value="
        <?php echo $usersByIndex->username ?>"> <br>

        <img src="iconEmail.png" alt="imagem icon email">
        <input type="email" id="idEmail" placeholder="Email de usuário" name="email" required
            value="<?php echo $usersByIndex->email ?>"> <br>

        <img src="iconKey.png" alt="imagem icon chave">
        <input type="password" id="idSenha" placeholder="Senha de usuário" name="password" required
            value="<?php echo $usersByIndex->password ?>"><br>

        <input type="submit" value="Atualizar" id="submitUpdate"><br> <br>

        <!-- link para voltar para a lista de usuários -->
        <a id="linkVoltar" href="listar.php">Voltar para a lista</a><br> <br>

    </form>

</body>

</html>