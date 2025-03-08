<?php
require_once '../../business/UsuarioService.php';
//permite iniciar sesion a nivel php
session_start();
//^^^^^session_start() inicia la varibale de sesion
$error = '';//variable almace error

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //hay una solicitud de tipo POST, el usuario esta enviando datos
    $email = trim($_POST['email']);//variables las cuales almacen los datos que envia el usuario
    $password = trim($_POST['password']);//$_POST[''];--->atrapa los datos que envia el usuario
    $userService = new UserService();
        //uso del authenticate para validar el login
        if ($userService->authenticate($email, $password)) {
            //$_SESSION crea una varibale de sesion asignando un valor al array $_SESSION
            $_SESSION['user'] = $email; //'user' es lo que guarda el valor, los nombres son separados por _
            /* $SESSION['nombre_usuario']="JESUS" */
            /* unset($_SESSION['']) --> SE USA PARA ELIMINAR VARIABLE DE SESION */
            /* unset() --> elimina todas las variables de sesion */
            /* Las variables de sesion usa cookis los cuales estan activas en los navegadores de no estarlo estas no funcionan */
            $_SESSION['nombre'] = 'Alex';
            
            header("Location: ../../presentation/dashboard/dashboard.php");
            exit();
        } else {
            $error = 'Usuario/Contraseña inválida.';
            /* session_destroy() cierra la session destruye la sesion activa */
            }
    }
?>
<?php include 'header.php'; ?>
<div class="container">
    <h1>Inicia sesión en tu cuenta</h1>
    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <label for="email">Tu correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>
        
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
        
        <div class="remember-forgot-container">
            <label class="remember-me">
                <input type="checkbox" name="remember"> Acuerdate de mi
            </label>
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
        </div>

        <button type="submit">Inicia sesión en tu cuenta</button>
    </form>
    <p><a href="#notienes">¿No tienes una cuenta?</a></p>
</div>
<?php include 'footer.php'; ?>
