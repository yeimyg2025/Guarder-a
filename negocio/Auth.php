<?php
include '../capa_datos/Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $db = new Database();
    if ($db->authenticateUser($email, $password)) {
        echo "¡Bienvenido!";
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>