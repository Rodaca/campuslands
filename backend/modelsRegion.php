<?php
    
    class Region extends Conectar{

        public function get_region(){
            try {
                $conectar=parent::conexion();
                parent::set_name();
                $stm = $conectar->prepare("SELECT * FROM region");

                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
    }

?>