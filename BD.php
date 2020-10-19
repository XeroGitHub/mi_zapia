<?php

class BD {

    public $ipServidor;
    public $usuario;
    public $contrasena;
    public $nombreBD;
    public $cnx;

    function __construct() {
        $this->ipServidor = "localhost";
        $this->usuario = "root";
        $this->contrasena = "";
        $this->nombreBD = "test";
    }

    function conectar() {

        $this->cnx = mysqli_connect($this->ipServidor, $this->usuario, $this->contrasena);

        if (mysqli_select_db($this->cnx, $this->nombreBD)) {
            return $this;
        } else
            return FALSE;
    }

    function query($sql) {

        $result = mysqli_query($this->cnx, $sql);

        $result = $result->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    function close() {
        mysqli_close($this->cnx);
    }

}

?>