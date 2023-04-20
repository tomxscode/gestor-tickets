<?php
class Equipo {
  private $conn;
  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function crearEquipo($marca, $modelo, $serial, $cliente_id, $observaciones) {
    $sql = "INSERT INTO equipos (marca, modelo, serial, dueno, comentarios) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssis", $marca, $modelo, $serial, $cliente_id, $observaciones);
    $stmt->execute();
    return $stmt->affected_rows > 0;
  }

  public function obtenerEquipos($pagina, $cantidad) {
    $inicio = ($pagina - 1) * $cantidad;
    $sql = "SELECT * FROM equipos LIMIT ?, ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $inicio, $cantidad);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
      $equipos = array();
      while ($fila = $resultado->fetch_assoc()) {
        $equipos[] = $fila;
      }
      return $equipos;
    } else {
      return array();
    }
  }

  public function obtenerCantidad() {
    $sql = "SELECT COUNT(*) as cantidad FROM equipos";
    $resultado = $this->conn->query($sql);
    $fila = $resultado->fetch_assoc();
    return $fila['cantidad']; 
  }

  public function obtenerEquipoPorId($equipo_id) {
    $sql = "SELECT * FROM equipos WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $equipo_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

  public function editarEquipo($equipo_id, $marca, $modelo, $serial, $observacion, $cliente) {
    $sql = "UPDATE equipos SET marca = ?, modelo = ?, serial = ?, dueno = ?, comentarios = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssisi", $marca, $modelo, $serial, $cliente, $observacion, $equipo_id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
  }
}
?>