<?php
include("banco.php");
use App\banco;
// $bd = file_get_contents("bd.json");
// $bd = json_decode($bd);
$banco = new banco() ;

$usersData = $banco->getUsersData() ;
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="listar.css">
</head>

<body>
    <h2 id="idh2">Lista de usuários cadastrados</h2>
    <a href="user.php"> <img id="idVoltar" src="iconVoltar.png" alt="imagem/link para voltar"></a>
    <div>

        <table id="idTable">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($usersData as $index => $users) {
                    echo "<tr>";
                    echo "<td>" . $index . "</td>";
                    echo "<td>" . $users->username . "</td>";
                    echo "<td>" . $users->email . "</td>";
                    echo "<td> <a href='deleteUser.php?delete=$index'>
                     <img id='idlixeira' src='iconLixeira.png' alt='imagem lixeira/link para deletar'> </a> </td>";
                    echo "<td> <a href='updateUser.php?editar=$index'>
                     <img id='idlapis'src='iconLapis.png' alt='imagem lápis/link para editar'></a> </td>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>