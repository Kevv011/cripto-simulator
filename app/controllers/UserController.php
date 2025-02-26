<?php
require_once "app/models/UserModel.php";

class UserController
{

    public function iniciar_sesion()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require "app/views/login.php";
        } else {
            if (isset($_POST['name-email']) && isset($_POST['password'])) {
                $usuario = strtolower($_POST['name-email']);
                $contraseña = $_POST['password'];

                $user = new User();
                $mensaje = $user->login($usuario, $contraseña);

                if ($mensaje === "Acceso concedido") {
                    header("Location: /cripto-simulator/Crypto/index");
                    exit();
                } else {
                    header("Location: /cripto-simulator/User/iniciar_sesion");
                    exit();
                }
            } else {
                header("Location: /cripto-simulator/User/iniciar_sesion");
                exit();
            }
        }
    }

    public function registro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require "app/views/registro.php";
        } else {
            $nombre = $_POST['userName'];
            $correo = $_POST['userEmail'];
            $contraseña = password_hash($_POST['UserPass'], PASSWORD_DEFAULT);

            $user = new User();
            $user->registro($nombre, $correo, $contraseña);

            if (strpos($user->registro($nombre, $correo, $contraseña), "Usuario registrado")) {
                header("Location: /cripto-simulator/Crypto/index");
                exit();
            } else {
                header("Location: /cripto-simulator/User/iniciar_sesion");
                exit();
            }
        }
    }

    public function cerrar_sesion()
    {

        $user = new User();
        $user->logout();
        require "app/views/home.php";
    }
}
