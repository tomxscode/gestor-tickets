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
}
?>