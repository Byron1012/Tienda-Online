<?php

class Usuario {
    //put your code here
    private $pdo;
    public $id;
    public $nombre;
    public $correo;
    public $contraseña;
    public $id_acceso;
    
    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuario");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM usuario WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM usuario WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE usuario SET 
						nombre         = ?, 
						correo        = ?,
                                                contraseña        = ?,
						id_acceso            = ?
                                                
				    WHERE id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->correo,
                                $data->contraseña,
                                $data->id_acceso,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Usuario $data) {
        try {
            $sql = "INSERT INTO usuario (nombre,correo,contraseña,id_acceso) 
		        VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->correo,
                                $data->contraseña,
                                $data->id_acceso
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function loginModel(Usuario $data) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM usuario WHERE correo = ? and contraseña = ?");
            $stm->execute(array(
                $data->correo,
                $data->contraseña,
            ));
            return $stm->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }   
}
