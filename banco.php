<?php
namespace App;
require_once "autoload.php";
class banco{

    //cpf tem que ser válido
    //o nome não pode ser duplicado
    private mixed $bd;
    public function __construct(){
       
        $bd = file_get_contents(ROOT_PATH . "/bd.json");//pesquisar
        $this->bd = json_decode($bd);
    }

    public function getUsersData():array{
        return $this->bd->users;
    }

    public function getUserByIndex(int $index)  {
        return $this->bd->users[$index];
    }

    public function validarIndex(int $index) {
        return isset($this->bd->users[$index]);
    }

    public function createUser(){
        return $this->bd->users;
    }

    //Banco clientes:
    public function createClientes(string $name, string $cpf, string $endereco):void{
        
        $cliente=[
            "name" => $name,
            "cpf"=> $cpf,
            "endereco"=> $endereco
        ];

        $this->bd->clientes[] = $cliente;

        $this->salvarDados();
    }

    public function salvarDados(){
        file_put_contents(__DIR__ . "/bd.json", json_encode( $this->bd, JSON_PRETTY_PRINT));
    }
}

?>