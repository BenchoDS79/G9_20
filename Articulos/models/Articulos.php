<?php
    class Articulos extends Conectar{

        public function get_articulos(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_articulos WHERE estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>