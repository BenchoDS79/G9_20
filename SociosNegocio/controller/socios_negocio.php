<?php
    if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,DELETE,PUT,PATCH,OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 17280000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    
    header('Access-Control-Allow-Origin: *');
    header('Content-type:application/json');


    require_once("../../config/conexion.php");
    require_once("../../SociosNegocio/models/Socios_negocio.php");
    

    
    $socio_negocio = new Socios_negocio();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

       
        case "GetSociosNegocio":
            $datos=$socio_negocio->get_socios_negocios();
            echo json_encode($datos);
        break;
        
        case "GetUno":
            $datos=$socio_negocio->get_socios_negocio($body["id"]);
            echo json_encode($datos);
        break; 

        case "InsertSocioNegocio":

           $datos=$socio_negocio->insert_socios_negocio($body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio Negocio Agregado");
        break; 

        case "UpdateSocioNegocio":
            
            $datos=$socio_negocio->Update_socios_negocio($body["nombre"],$body["razon_social"],$body["direccion"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"],$body["id"]);
            echo json_encode("Socio Negocio Actualizado");
        break;

        case "DeleteSocioNegocio":

            $datos=$socio_negocio->Delete_socio_negocio($body["id"]);
            echo json_encode("Socio Negocio Eliminado");
        break; 
    }







?>