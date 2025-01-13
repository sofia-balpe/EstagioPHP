<?php
// $numbers = array(1, 2, 3, 4, 5, 6);

// // foreach ($numbers as $value) {
// //     echo $value;
// // }

// $cores = array("Vermelho" , "Laranja", "Amarelo", "Verde", "Azul");

// foreach($cores as $value){
//     if ($value == "Vermelho") {
//         print $value;
//         break;
//     }
// }

// $nome = "Sofia";
// while ($nome == "Sofia") {
//     print "Sofia a mais top";
//     break;
// }

// echo '<h1>Meu Código</h1>';
// echo '<p>Sofia Sofia Sofia</p>';
// echo "<div>";
// echo '<input type="text">';
//   foreach ($cores as $value)
//   {
//         echo "<p> $value </p>";
//   } 
//  echo "</div>";

session_start();
$password = $_POST["password"];
$username = $_POST["Username"];
$email = $_POST["email"];

// echo $username; 
// echo $password;
// echo $email;



if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['feedback'] = "Email iválido";
    header("location: user.php");
    exit();
}

if (strlen($password) < 8) {
    $_SESSION['feedback'] = "Senha deve ter no mínimo 8 caracteres";
    header("location: user.php");
    exit();
}

var_dump("Passou do ifs");

//Colocar mais campo
//Validar para mostrar todos os erros de uma vez (lista de erros array) $erros = []
//deixar o erro vermelho (estilizar);





