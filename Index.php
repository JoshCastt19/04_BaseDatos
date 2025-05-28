<?php
require_once "Conexion.php";

$objConexion = new Conexion();
$con = $objConexion->getConexion();

$sql = "SELECT * FROM persona WHERE estado = 1";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        print "ID: " . $fila['id'] . "<br>";
        print "Nombre Completo: " . $fila['nombres'] . " " . $fila['apellidos'] . "<br>";
        print "DNI: " . $fila['dni'] . "<br>";
        print "Telef: " . $fila['telefono'] . "<br>";
        print "Correo: " . $fila['correo'] . "<br>";
        print "Estado: " . ($fila['estado'] == 1 ? 'Activo' : 'Inactivo') . "<br>";
        print "Fecha creación: " . $fila['fecha_creado'] . "<br>";
        echo "<hr>";
    }
} else {
    print "0 resultados<br>";
}

$sql = "INSERT INTO persona (nombres, apellidos, dni, telefono, correo)
        VALUES ('julia', 'gomez', '77889944', '963852000', 'jgomez@gmail.com')";
if ($con->query($sql) === TRUE) {
    print "Registrado exitosamente<br>";
} else {
    print "No se registró: " . $con->error . "<br>";
}

//hacer pruebas con update where
$sql = "UPDATE persona SET telefono = '999999999' WHERE dni = '77889944'";
if ($con->query($sql) === TRUE) {
    print "Teléfono actualizado correctamente<br>";
} else {
    print "Error al actualizar: " . $con->error . "<br>";
}

//hacer pruebas con DELETE WHERE
$sql = "DELETE FROM persona WHERE dni = '77889944'";
if ($con->query($sql) === TRUE) {
    print "Registro eliminado correctamente<br>";
} else {
    print "Error al eliminar: " . $con->error . "<br>";
}
?>
