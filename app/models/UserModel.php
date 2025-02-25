<?php

class User
{

    //Metodo para guardar datos del registro del usuario
    public function registro($nombre, $contraseña)
    {
        if (isset($_SESSION['usuario'], $_SESSION['contraseña'])) {

            $_SESSION['usuario'] = strtolower($nombre);
            $_SESSION['contraseña'] = $contraseña;
        }
        return "Usuario registrado";
    }

    //Metodo para iniciar sesion
    public function login($usuario, $contraseña) {

        if($_SESSION['usuario'] === $usuario && $_SESSION['contraseña'] == $contraseña) {
            return "Acceso concedido";
        } else {
            return "Acceso denegado";
        }
    }

    //Metodo para cerra sesion
    public function logout() {
        unset($_SESSION['usuario']);
        unset($_SESSION['contraseña']);
    }
}
