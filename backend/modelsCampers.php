<?php
    
    class Campers extends Conectar{

        public function get_campers(){
            try {
                $conectar=parent::conexion();
                parent::set_name();
                $stm = $conectar->prepare("SELECT c.idCamper,c.nombreCamper,c.apellidoCamper,c.fechaNac,r.nombreReg,c.idReg FROM campers c JOIN region r ON c.idReg = r.idReg");

                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function inser_campers($nombreCamper,$apellidoCamper,$fechaNac,$idReg){
            $conectar=parent::conexion();
            parent::set_name();
            $stm="INSERT INTO campers(nombreCamper,apellidoCamper,fechaNac,idReg) VALUES(?,?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$nombreCamper);
            $stm->bindValue(2,$apellidoCamper);
            $stm->bindValue(3,$fechaNac);
            $stm->bindValue(4,$idReg);

            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }


        public function delete_campers($idCamper){
            $conectar=parent::conexion();
            parent::set_name();
            $stm="DELETE FROM campers WHERE idCamper=?";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$idCamper);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_camper($nombreCamper,$apellidoCamper,$fechaNac,$idReg,$idCamper){
            try {
                $conectar=parent::conexion();
                parent::set_name();
                $stm = $conectar->prepare("UPDATE campers SET nombreCamper=?, apellidoCamper=?, fechaNac=?, idReg=? WHERE idCamper=? ");
                $stm->bindValue(1, $nombreCamper);
                $stm->bindValue(2, $apellidoCamper);
                $stm->bindValue(3, $fechaNac);
                $stm->bindValue(4, $idReg);
                $stm->bindValue(5, $idCamper);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exeption $e) {
                return $e->getMessage();
            }
        }
        public function get_camper_id($idCamper){
            try {
                $conectar=parent::conexion();
                parent::set_name();
                $stm=$conectar->prepare("SELECT * FROM campers WHERE idCamper=?");
                $stm->bindValue(1,$idCamper);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exeption $e) {
                return $e->getMessage();
            }
        }
    }



?>