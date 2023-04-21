<?php
class Usuario {
  private $conn;

  // Constructor
  public function __construct($conn) {
    $this->conn = $conn;
  }

  // Métodos
  public function obtenerUsuarios() {
    $sql = "SELECT * FROM usuarios";
    $resultado = $this->conn->query($sql);

    if ($resultado->num_rows > 0) {
      $usuarios = array();
      while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
      }
      return $usuarios;
    } else {
      return array();
    }
  }

  public function obtenerUsuario($user_id) {
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
      return $resultado->fetch_assoc();
    } else {
      return null;
    }
  }
}
?>