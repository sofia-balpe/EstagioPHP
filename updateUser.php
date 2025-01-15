<?php
session_start();
$editar = $_GET['editar'];

$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

// $sucess = $_SESSION['sucess'] ?? false;
// unset($_SESSION['sucess']);
$bd = file_get_contents("bd.json");
$bd = json_decode($bd);


if (!isset($bd->users[$editar])) {
    $_SESSION['erro'] = "índice não existe";
    header('location: listar.php');
    exit();
}


$user = $bd->users[$editar];
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
if($feedback != false){
    foreach ($feedback as $value) {
        echo '*' . $value . '<br>';
    }
}
    ?>

    <form action="updateValidate.php?editar=<?php echo $editar ?>" method="post" id="idForm">
        <h1 id="idh1">Atualizar dados</h1>

        <img src="iconUser.png" alt="imagem icon usuário">
        <input type="text" id="idUser" placeholder="Nome de usuário" name="Username" required value="
        <?php echo $user->username ?>"> <br>

        <img src="iconEmail.png" alt="imagem icon email">
        <input type="email" id="idEmail" placeholder="Email de usuário" name="email" required
            value="<?php echo $user->email ?>"> <br>

        <img src="iconKey.png" alt="imagem icon chave">
        <input type="password" id="idSenha" placeholder="Senha de usuário" name="password" required
            value="<?php echo $user->password ?>"><br>

        <input type="submit" value="Atualizar" id="idSubmit"><br>

        <a href="listar.php">Voltar para a lista</a>

    </form>
   
</body>

</html>