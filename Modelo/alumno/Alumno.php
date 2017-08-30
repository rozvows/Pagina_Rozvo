<?php

class Alumno {

    public $id="";
    public $nombre="";
    public $apellido_paterno="";
    public $apellido_materno="";
    public $sexo="";
    public $edad="";
    public $correo="";
    public $telefono="";

    function __construct() {
        try {
            $this->pdo = Database::abrir();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Lista todos los alumnos
    public function listar() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM alumno");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Busca un alumno por id
    public function buscar($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE id = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Elimina un alumno por id
    public function eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM alumnos WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Cambia los datos de un alumno 
    public function cambiar($data) {
        try {
            $sql = "UPDATE alumnos 
                    SET 
                       nombre = ?, 
                       apellido_paterno = ?,
                       apellido_materno = ?,
                       sexo = ?,
                       edad = ?,
                       correo = ?,
                       telefono = ?
                    WHERE 
                       id = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->Nombre,
                                $data->Correo,
                                $data->Apellido,
                                $data->Sexo,
                                $data->FechaNacimiento,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //Agrega un alumno
    public function agregar(Alumno $data) {
        try {
            $sql = "INSERT INTO alumnos (Nombre,Correo,Apellido,Sexo,FechaNacimiento,FechaRegistro) 
		        VALUES (?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->Nombre,
                                $data->Correo,
                                $data->Apellido,
                                $data->Sexo,
                                $data->FechaNacimiento,
                                date('Y-m-d')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
