<?php

    class Articulos extends Conectar{

        public function get_articulos(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM g9_20.ma_articulos WHERE estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_articulo($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g9_20.ma_articulos WHERE estado = 1 AND id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_articulo($Descripcion,$Unidad,$Costo,$Precio,$Aplica_ISV,$Porcentaje_ISV,$Estado,$Id_socio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO g9_20.ma_articulos(id,Descripcion,Unidad,Costo,Precio,Aplica_ISV,Porcentaje_ISV,Estado,Id_socio)
            VALUES(NULL,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Descripcion);
            $sql->bindValue(2, $Unidad);
            $sql->bindValue(3, $Costo);
            $sql->bindValue(4, $Precio);
            $sql->bindValue(5, $Aplica_ISV);
            $sql->bindValue(6, $Porcentaje_ISV);
            $sql->bindValue(7, $Estado);
            $sql->bindValue(8, $Id_socio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_articulo($Descripcion,$Unidad,$Costo,$Precio,$Aplica_ISV,$Porcentaje_ISV,$Estado,$Id_socio,$id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_articulos
            SET Descripcion=?, Unidad=?, Costo=?, Precio=?, Aplica_ISV=?, Porcentaje_ISV=?, Estado=?, Id_socio=?
            WHERE id = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Descripcion);
            $sql->bindValue(2, $Unidad);
            $sql->bindValue(3, $Costo);
            $sql->bindValue(4, $Precio);
            $sql->bindValue(5, $Aplica_ISV);
            $sql->bindValue(6, $Porcentaje_ISV);
            $sql->bindValue(7, $Estado);
            $sql->bindValue(8, $Id_socio);
            $sql->bindValue(9, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_articulo($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM g9_20.ma_articulos WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>