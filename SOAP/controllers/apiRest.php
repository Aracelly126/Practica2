<?php

// Incluimos los modelos necesarios
include '../models/acceder.php';
include '../models/guardar.php';
include '../models/borrar.php';
include '../models/editar.php';

$opc = $_SERVER['REQUEST_METHOD']; 

switch($opc) {
    case 'GET':
        if (isset($_GET['cedula'])) {
            $cedula = $_GET['cedula'];
            crudS::seleccionarEstudiante($cedula); 
        } else {
            crudS::seleccionarEstudiante(); 
        }
        break;

    case 'POST':
        crudI::guardarEstudiantes(); 
        break;

    case 'DELETE':
        crudB::borrarEstudiante(); 
        break;

    case 'PUT':
        //crudE::editarEstudiantes(); 
        crudE::editarEstudiantes();

        //crudA::actualizarEstudiante($_GET['cedulaEditar'], $_GET['cedula'], $_GET['nombre'], $_GET['apellido'], $_GET['direccion'], $_GET['telefono']);

        break;
}

?>
