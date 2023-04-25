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
    public function registrarInformacion($trabajo_id, $ingreso, $estado, $diag_inicial) {
        $sql = "INSERT INTO tr_informacion (identificador_trabajo, ingreso, egreso, estado, precio, diag_inicial) VALUES (?, ?, '10/04/2023', ?, 0, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isis", $trabajo_id, $ingreso, $estado, $diag_inicial);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>