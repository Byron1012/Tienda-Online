<?php

class Juego {
    private $pdo;
    public $id;
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
    
    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM juego WHERE cantidad > 0");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM juego WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM juego WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Juego $data) {
        try {
            
            $sql = "UPDATE juego SET 
						nombre          = ?, 
						cantidad        = ?,
                                                descuento        = ?,
						precio            = ?, 
                                                url            = ?,
                                                categoria            = ?,
                                                edicionLimitada            = ?,
                                                incluyeDLC            = ?,
                                                descripcionCorta            = ?,
                                                descripcionLarga            = ?
				    WHERE id = ?";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->cantidad,
                                $data->descuento,
                                $data->precio,
                                $data->url,
                                $data->categoria,
                                $data->edicionLimitada,
                                $data->incluyeDLC,
                                $data->descripcionCorta,
                                $data->descripcionLarga,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Juego $data) {
        try {
            $sql = "INSERT INTO juego (nombre,cantidad,descuento,precio,url,categoria,edicionLimitada,incluyeDLC,descripcionCorta,descripcionLarga) 
		        VALUES (?,?,?,?,?,?,?,?,?,?)";
            
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombre,
                                $data->cantidad,
                                $data->descuento,
                                $data->precio,
                                $data->url,
                                $data->categoria,
                                $data->edicionLimitada,
                                $data->incluyeDLC,
                                $data->descripcionCorta,
                                $data->descripcionLarga
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}