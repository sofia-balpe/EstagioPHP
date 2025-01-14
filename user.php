<?php
session_start();
$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

$sucess = $_SESSION['sucess'] ?? false;
unset($_SESSION['sucess']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">

</head>


<body>

    <div>

        <div id="divErros" style="color: red">
            <?php
            if ($feedback != false)
                foreach ($feedback as $value) {
                    echo '*' . $value . '<br>';

                }
            ?>
           <div id="divSucess" style="color: green">
            <?php
            if ($sucess != false) {
                echo $sucess;
            }
            ?>
           </div> 
         
        </div>



        <form action="index.php" method="post" id="idForm">
            <h1 id="idh1">Bem vinda(o)!</h1>
            <img src="iconUser.png" alt="imagem icon usuário">
            <input type="text" id="idUser" placeholder="Nome de usuário" name="Username" required> <br>
            <img src="iconEmail.png" alt="imagem icon email">
            <input type="email" id="idEmail" placeholder="Email de usuário" name="email" required> <br>
            <img src="iconKey.png" alt="imagem icon chave">
            <input type="password" id="idSenha" placeholder="Senha de usuário" name="password" required><br>
            <input type="submit" value="Enviar dados" id="idSubmit" onclick="event">
            <a href="listar.php"> Listar</a>
        </form>

    </div>

    <!-- <script>
        function clicar(params) {
            
        }
    </script> -->
</body>

</html>