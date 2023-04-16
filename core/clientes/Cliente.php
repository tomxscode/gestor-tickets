<?php
class Cliente {
    private $conn;

    // Constrcutor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Funciones
    public function obtenerClientes() {
        $sql = "SELECT * FROM clientes";
        $resultado = $this->conn->query($sql);

        // Verifica si hay columnas
        if ($resultado->num_rows > 0) {
            // Creamos un array para almacenar los resultados
            $clientes = array();
            // iteramos los resultados y los agregamos al array
            while ($fila = $resultado->fetch_assoc()) {
                $clientes[] = $fila;
            }
            return $clientes;
        } else {
            return array();
        }
    }
}
?>