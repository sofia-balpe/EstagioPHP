<?php
namespace App;
class banco{

    private mixed $bd;
    public function __construct(){
    
        $bd = file_get_contents("bd.json");
        $this->bd = json_decode($bd);
        // var_dump($bd);
        // exit();
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
}

?>