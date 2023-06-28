<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    header('Content-Type:application/json');

    require_once("conectar.php");
    require_once("modelsRegion.php");

    $dato = new Region;
    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET['op']) {
        case 'read':
            $datos = $dato->get_region();
            echo json_encode($datos);
        break;
        default:
            # code...
            break;
    }

?>