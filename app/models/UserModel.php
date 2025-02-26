<?php
class User
{

    //Metodo para guardar datos del registro del usuario
    public function registro($nombre, $correo, $contraseña)
    {
        $_SESSION['usuario'] = strtolower($nombre);
        $_SESSION['correo'] = $correo;
        $_SESSION['contraseña'] = $contraseña;

        return "Usuario registrado";
    }

    //Metodo para iniciar sesion
    public function login($usuario, $contraseña)
    {
        // Si no hay datos en la sesión, no puede autenticarse
        if (!isset($_SESSION['usuario'], $_SESSION['correo'], $_SESSION['contraseña'])) {
            return "Acceso denegado";
        }

        if (($usuario == $_SESSION['usuario'] || $usuario == $_SESSION['correo']) && password_verify($contraseña, $_SESSION['contraseña'])) {
            $_SESSION['autenticado'] = true; //Indica sesión activa para poder usar el Logout
            return "Acceso concedido";
        } else {
            return "Acceso denegado";
        }
    }

    //Metodo para cerra sesion
    public function logout()
    {
        $_SESSION['autenticado'] = false;
    }
}
