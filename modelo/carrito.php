<?php

class Carrito {

    private $pdo;
    public $id;
    public $id_usuario;
    public $id_juego;
    public $cantidad_carrito;
    public $activo;
    
    public $nombre;
    public $cantidad;
    public $descuento;
    public $precio;
    public $url;
    public $categoria;
    public $edicionLimitada;
    public $incluyeDLC;
    public $descripcionCorta;
    public $descripcionLarga;
    
    

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener(Carrito $data) {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT a.id,a.id_juego,b.nombre,b.cantidad,b.descuento,b.precio,b.url,b.categoria,b.edicionLimitada,b.incluyeDLC,b.descripcionCorta,b.descripcionLarga,a.cantidad_carrito,a.activo FROM carrito a 
    INNER JOIN juego b ON b.id = a.id_juego
    INNER JOIN usuario c ON c.id = a.id_usuario WHERE c.id = ? && a.activo=1");
            $stm->execute(array(
                $data->id_usuario
            ));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Carrito $data) {
        try {
            $sql = "INSERT INTO carrito (id_usuario,id_juego,cantidad_carrito,activo) 
		        VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->id_usuario,
                                $data->id_juego,
                                $data->cantidad_carrito,
                                $data->activo
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM carrito WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Actualizar(Carrito $data) {
        try {
            
            $sql = "UPDATE carrito SET 
						activo          = ?
				    WHERE id_usuario = ?";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->activo, 
                                $data->id_usuario
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}
