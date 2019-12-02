<?php

class Factura {

    private $pdo;
    public $id;
    public $id_usuario;
    public $subtotal;
    public $iva;
    public $total;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM factura WHERE id_usuario = ?");


            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Registrar(Factura $data) {
        try {
            $sql = "INSERT INTO factura (id_usuario,subtotal,iva,total) 
		        VALUES (?,?,?,?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->id_usuario,
                                $data->subtotal,
                                $data->iva,
                                $data->total
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
