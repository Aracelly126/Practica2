<?php
class crudI
{
    public static function guardarEstudiantes()
    {
        include_once "conexion.php";
        $objetoconexion = new conexion();
        $conn = $objetoconexion->conectar();

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $verificarEstudiante = "SELECT * FROM estudiantes WHERE cedula = :cedula";
        $stmt = $conn->prepare($verificarEstudiante);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $actualizarEstudiante = "UPDATE estudiantes SET nombre = :nombre, apellido = :apellido, direccion = :direccion, telefono = :telefono WHERE cedula = :cedula";
            $result = $conn->prepare($actualizarEstudiante);
            $result->bindParam(':cedula', $cedula);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':apellido', $apellido);
            $result->bindParam(':direccion', $direccion);
            $result->bindParam(':telefono', $telefono);
            $result->execute();
            $dataJson = json_encode("Se actualizó correctamente");
        } else {
            $guardarEstudiante = "INSERT INTO estudiantes (cedula, nombre, apellido, direccion, telefono) VALUES (:cedula, :nombre, :apellido, :direccion, :telefono)";
            $result = $conn->prepare($guardarEstudiante);
            $result->bindParam(':cedula', $cedula);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':apellido', $apellido);
            $result->bindParam(':direccion', $direccion);
            $result->bindParam(':telefono', $telefono);
            $result->execute();
            $dataJson = json_encode("Se insertó correctamente");
        }

        print_r($dataJson);
    }
}

?>