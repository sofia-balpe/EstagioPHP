<?php

$delete = $_GET['delete'];

$bd = file_get_contents("bd.json");
$bd = json_decode($bd);


if(!isset($bd->users["index"])) {
    $_SESSION['erro'] = "índice não existe";
    header('location: listar.php');
    exit();
}

$newList = array_splice($bd->users, $index,0);

$bd->users = $newlist;

$users = file_put_contents("bd.json", json_encode($bd, JSON_PRETTY_PRINT));
header('Location: listar.php');



?>