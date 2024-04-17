<?php

/*----- Tabla Venta -----*/
// id_venta INT PRIMARY KEY
// fk_producto VARCHAR(7) Este seria el codigo del producto
// fk_usuario VARCHAR(15) Este seria el Cliente

/*----- Tabla Usuario -----*/
// cedula VARCHAR(15) PRIMARY KEY
// nombre VARCHAR(50)
// apellido VARCHAR(50)
// telefono VARCHAR(15)
// direccion TEXT
// fk_tipo INT Si el usuario es cliente o Trabajador

class VentaModel
{
    private $conn;

    
    private function Conexion()
    {
        include_once "./Conexion.php";
        $this->conn = new Conexion;
    }
}
