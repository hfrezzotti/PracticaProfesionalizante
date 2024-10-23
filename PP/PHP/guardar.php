<?php
// Configuración de la base de datos
$host = 'localhost'; 
$puerto = '5432'; 
$usuario = 'postgres'; 
$contraseña = 'hrna1990'; 
$nombreBaseDatos = 'Proyecto'; 

// Crear conexión
$conn = pg_connect("host=$host port=$puerto dbname=$nombreBaseDatos user=$usuario password=$contraseña");

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

// Preparar la consulta
$sql = "INSERT INTO presentaciones (nombre, apellido, profesion, lugarTrabajo, aniosExperiencia, sueldo, instagram, linkedin, email, resumen, username, password) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12)";
$result = pg_prepare($conn, "insert_presentacion", $sql);

// Asignar valores del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$profesion = $_POST['profesion'];
$lugarTrabajo = $_POST['lugarTrabajo'];
$aniosExperiencia = $_POST['aniosExperiencia'];
$sueldo = $_POST['sueldo'];
$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];
$email = $_POST['email'];
$resumen = $_POST['resumen'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

// Ejecutar la consulta
$result = pg_execute($conn, "insert_presentacion", array($nombre, $apellido, $profesion, $lugarTrabajo, $aniosExperiencia, $sueldo, $instagram, $linkedin, $email, $resumen, $username, $password));

if ($result) {
    echo "Datos guardados exitosamente.";
} else {
    error_log("Error en la inserción: " . pg_last_error($conn), 3, "error_log.txt");
    echo "Error al guardar los datos.";
}

// Cerrar conexión
pg_close($conn);
?>

