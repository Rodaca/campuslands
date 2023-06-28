<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    header('Content-Type:application/json');

    require_once("conectar.php");
    require_once("modelsCampers.php");

    $dato = new Campers;
    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET['op']) {
        case 'read':
            $datos = $dato->get_campers();
            echo json_encode($datos);
        break;
        case 'insert':
            $datos = $dato->inser_campers($body["nombreCamper"],$body["apellidoCamper"],$body["fechaNac"],$body["idReg"]);
            echo json_encode("los datos se insertaron");
        break;
        case 'delete':
            $datos = $dato->delete_campers($_GET["id"]);
            echo json_encode($datos);
        break;
        case 'readOne':
            $datos = $dato->get_camper_id($_GET['id']);
            echo json_encode($datos);
        break;
        case 'update':
            $datos = $dato->update_camper($body["nombreCamper"],$body["apellidoCamper"],$body["fechaNac"],$body["idReg"],$body["idCamper"]);
            echo json_encode("Datos Actualizados");
        break;
        default:
            # code...
            break;
    }

?>