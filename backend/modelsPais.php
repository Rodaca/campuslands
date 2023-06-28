<?php
    
    class Pais extends Conectar{

        public function get_pais(){
            try {
                $conectar=parent::conexion();
                parent::set_name();
                $stm = $conectar->prepare("SELECT * FROM pais");

                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function inser_pais($nombreDep){
            $conectar=parent::conexion();
            parent::set_name();
            $stm="INSERT INTO pais(nombreDep) VALUES(?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$nombreDep);

            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }



















        public function delete_clientes($id_constructora){
            $conectar=parent::conexion();
            parent::set_name();
            $stm="DELETE FROM constructoras WHERE id_constructora=?";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_constructora);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
















        
        public function update_cliente($id_constructora, $nombre_constructora, $nit_constructora, $nombre_representante, $email_contacto, $telefono_contacto){
            try {
                $conectar=parent::conexion();
                parent::set_name();
                $stm = $conectar->prepare("UPDATE constructoras SET nombre_constructora=?, nit_constructora=?, nombre_representante=?, email_contacto=?, telefono_contacto=? WHERE id_constructora=? ");
                $stm->bindValue(1, $nombre_constructora);
                $stm->bindValue(2, $nit_constructora);
                $stm->bindValue(3, $nombre_representante);
                $stm->bindValue(4, $email_contacto);
                $stm->bindValue(5, $telefono_contacto);
                $stm->bindValue(6, $id_constructora);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exeption $e) {
                return $e->getMessage();
            }
        }
    }



?>