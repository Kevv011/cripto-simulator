<?php
require_once "app/models/UserModel.php";

class UserController
{

    //Metodo usado para iniciar sesion
    public function iniciar_sesion()
    {

        //Si solo se quiere entrar al form de LOGIN, se obtiene un REQUEST de tipo GET para este
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require "app/views/login.php";

            //Si no es GET es porque se mandan los datos para un inicio de sesion, por lo que detecta el REQUEST de tipo POST
        } else {

            //Si las variables enviadas con POST contienen informacion, esta se procesa para el login y se guarda
            if (isset($_POST['name-email']) && isset($_POST['password'])) {
                $usuario = strtolower($_POST['name-email']);
                $contraseña = $_POST['password'];

                //Instancia de la clase del modelo UserModel.php para aplicar la funcionalidad del login
                $user = new User();
                $mensaje = $user->login($usuario, $contraseña);

                //Si son correctas las credenciales, se devuelve a la pag principal con un usuario logueado
                if ($mensaje === "Acceso concedido") {
                    header("Location: /cripto-simulator/Crypto/index");
                    exit();

                //Si no, se devuelve a la vista del Login 
                } else {
                    header("Location: /cripto-simulator/User/iniciar_sesion");
                    exit();
                }

                //Si no se detectan datos, se devuelve al login
            } else {
                header("Location: /cripto-simulator/User/iniciar_sesion");
                exit();
            }
        }
    }

    //Metodo para registrar un usuario
    public function registro()
    {
        //Si solo se quiere entrar al form de REGISTRO, se obtiene un REQUEST de tipo GET para este
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require "app/views/registro.php";

            //Si no es GET es porque se mandan los datos para registro de usuario, por lo que detecta el REQUEST de tipo POST
        } else {
            $nombre = $_POST['userName'];
            $correo = $_POST['userEmail'];
            $contraseña = password_hash($_POST['UserPass'], PASSWORD_DEFAULT); //Hash de la contraseña

            //Instancia de la clase del modelo UserModel.php para aplicar la funcionalidad del registro de usuario
            $user = new User();
            $mensaje = $user->registro($nombre, $correo, $contraseña);

            //Si se crea un usuario, se devuelve a la vista del login para iniciar sesion
            if ($mensaje === "Usuario registrado") {
                header("Location: /cripto-simulator/User/iniciar_sesion");
                exit();

            //Si no, se devuelve a la pagina principal
            } else {
                header("Location: /cripto-simulator/User/iniciar_sesion");
                header("Location: /cripto-simulator/Crypto/index");
                exit();
            }
        }
    }

    //Metodo para cerrar la sesion de un usuario
    public function cerrar_sesion()
    {
        //Se instancia la clase del modelo y se aplica el metodo de cerrar sesion
        $user = new User();
        $user->logout();
        require "app/views/home.php";
    }
}
