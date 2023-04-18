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

    public function obtenerCantidadClientes() {
        $sql = "SELECT COUNT(*) as cantidad FROM clientes";
        $resultado = $this->conn->query($sql);
        $fila = $resultado->fetch_assoc();
        return $fila['cantidad'];
    }

    public function obtenerClientesX($pagina, $cantidad) {
        $inicio = ($pagina - 1) * $cantidad;
        $sql = "SELECT * FROM clientes LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $inicio, $cantidad);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            $clientes = array();
            while ($fila = $resultado->fetch_assoc()) {
                $clientes[] = $fila;
            }
            return $clientes;
        } else {
            return array();
        }
    }

    public function buscarclientePorId($cliente_id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cliente_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
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

    public function editarCliente(string $nombre, int $telefono, int $id) {
        $sql = "UPDATE clientes SET nombre = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $nombre, $telefono, $id);
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