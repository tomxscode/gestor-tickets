<?php
class Trabajo {
    private $conn;
    private $id_trabajo_reg;

    // Constructor
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Setter
    public function setIdTrabajoReg($id) {
        $this->id_trabajo_reg = $id;
    }

    // Getter
    public function getIdTrabajoReg() {
        return $this->id_trabajo_reg;
    }
    // métodos
    public function registrarTrabajo($cliente_id, $equipo_id) {
        $sql = "INSERT INTO tr_equipo (cliente_id, equipo_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        // Asignar valores a los parámetros
        $stmt->bind_param("ii", $cliente_id, $equipo_id);
        $stmt->execute();
    
        $id = mysqli_insert_id($this->conn);
        $this->setIdTrabajoReg($id);
        return $id;
    }
}
?>