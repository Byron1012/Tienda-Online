<?php

class Contactos {
    private $pdo;
    public $id;
    public $nombre;
    public $asunto;
    public $correo;
    public $mensaje;
    
    
    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Registrar(Contactos $data) {
        try {
            $sql = "INSERT INTO contactos (nombre,asunto,correo,mensaje) 
		        VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->asunto,
                                $data->correo,
                                $data->mensaje
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}
