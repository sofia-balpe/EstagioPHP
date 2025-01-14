<?php
$bd = file_get_contents("bd.json");
$bd = json_decode($bd);
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Listar usuários cadastrados</h2>
    <div>

        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                foreach ($bd->users as $index => $users) {
                    echo "<tr>";
                    echo "<td>" . $index . "</td>";
                    echo "<td>" . $users->username ."</td>";
                    echo "<td>". $users->email ."</td>";
                    echo "<td> <a href='deleteUser.php?delete=$index'> delete</a> </td>";  
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>