<?php

class Acceso {
    private $pdo;
    public $id;
    public $tipo;
    
    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}