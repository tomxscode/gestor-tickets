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
}
?>