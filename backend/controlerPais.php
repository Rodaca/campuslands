<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    header('Content-Type:application/json');

    require_once("conectar.php");
    require_once("modelsPais.php");

    $dato = new Pais;
    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET['op']) {
        case 'read':
            $datos = $dato->get_pais();
            echo json_encode($datos);
        break;
        case 'insert':
            $datos = $dato->inser_clientes($body["nombreDep"]);
            echo json_encode("los datos se insertaron");
        break;





























        case 'delete':
            $datos = $alquilar->delete_clientes($_GET["id"]);
            echo json_encode($datos);
        break;
        case 'update':
            $datos = $alquilar->update_cliente($body['id_constructora'],$body['nombre_constructora'],$body['nit_constructora'],$body['nombre_representante'], $body['email_contacto'], $body['telefono_contacto']);
            echo json_encode("Datos Actualizados");
        break;
        default:
            # code...
            break;
    }

?>