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

    public function crearCliente($nombre, $telefono) {
        // Creamos la consulta
        $sql = "INSERT INTO clientes (nombre, telefono) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        // Asignamos los valores
        $stmt->bind_param("si", $nombre, $telefono);
        // Ejecuta la consulta
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function eliminarCliente($cliente_id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cliente_id);
        return $stmt->execute();
    }
}
?>