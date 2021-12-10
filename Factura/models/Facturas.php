<?php
    class Facturas extends Conectar{

        public function get_facturas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g9_20.ma_facturas WHERE estado = 1 ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_factura($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g9_20.ma_facturas WHERE estado = 1 AND id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insert_factura($NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO g9_20.ma_facturas(id,NUMERO_FACTURA,ID_SOCIO,FECHA_FACTURA,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_VENCIMIENTO,ESTADO)
            VALUES(NULL,?,?,?,?,?,?,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NUMERO_FACTURA);
            $sql->bindValue(2, $ID_SOCIO);
            $sql->bindValue(3, $FECHA_FACTURA);
            $sql->bindValue(4, $DETALLE);
            $sql->bindValue(5, $SUB_TOTAL);
            $sql->bindValue(6, $TOTAL_ISV);
            $sql->bindValue(7, $TOTAL);
            $sql->bindValue(8, $FECHA_VENCIMIENTO);
            $sql->bindValue(9, $ESTADO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function update_factura($NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO,$ESTADO,$id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql= "UPDATE ma_facturas
            SET NUMERO_FACTURA=?, ID_SOCIO=?, FECHA_FACTURA=?, DETALLE=?, SUB_TOTAL=?, TOTAL_ISV=?, TOTAL=?, FECHA_VENCIMIENTO=?, ESTADO=?
            WHERE id = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NUMERO_FACTURA);
            $sql->bindValue(2, $ID_SOCIO);
            $sql->bindValue(3, $FECHA_FACTURA);
            $sql->bindValue(4, $DETALLE);
            $sql->bindValue(5, $SUB_TOTAL);
            $sql->bindValue(6, $TOTAL_ISV);
            $sql->bindValue(7, $TOTAL);
            $sql->bindValue(8, $FECHA_VENCIMIENTO);
            $sql->bindValue(9, $ESTADO);
            $sql->bindValue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
        
          public function delete_factura($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql= "DELETE FROM g9_20.ma_facturas WHERE id = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
          }
    }
?>