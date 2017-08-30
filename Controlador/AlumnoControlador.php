<?php
require_once '../Modelo/alumno/Alumno.php';

class AlumnoControlador{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    }
    
    public function listar(){
        require_once '../Vista/header.php';
        require_once '../Vista/alumno/listar.php';
        require_once '../Vista/footer.php';
    }
    
    public function cambiar(){
        $alm = new Alumno();
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/alumno-editar.php';
        require_once 'view/footer.php';
    }
    
    public function agregar(){
        $alm = new Alumno();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellido = $_REQUEST['Apellido'];
        $alm->Correo = $_REQUEST['Correo'];
        $alm->Sexo = $_REQUEST['Sexo'];
        $alm->FechaNacimiento = $_REQUEST['FechaNacimiento'];
        
        $alm->id > 0 ? $this->model->Actualizar($alm): $this->model->Registrar($alm);
        header('Location: index.php');
    }
    
    public function eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}