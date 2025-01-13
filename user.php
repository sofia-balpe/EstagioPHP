<?php 
session_start();
$feedback = $_SESSION['feedback']?? false;
unset($_SESSION['feedback']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

    <div>
        <?php 
            if ($feedback != false) {
                echo "<P> $feedback</p>";
            }
        ?>

        <form action="index.php" method="post">

            <input type="" placeholder="Nome de usuário" name="Username" required>
            <input type="email" placeholder="Email de usuário" name="email" required>
            <input type="password" placeholder="Senha de usuário" name="password" required>
            <input type="submit" value="Enviar dados">
        </form>
    </div>

</body>

</html>