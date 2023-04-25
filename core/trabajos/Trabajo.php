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
    // métodos crear
    public function registrarTrabajo($cliente_id, $equipo_id, $identificador) {
        $sql = "INSERT INTO tr_equipo (cliente_id, equipo_id, identificador) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        // Asignar valores a los parámetros
        $stmt->bind_param("iis", $cliente_id, $equipo_id, $identificador);
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
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function registrarAccion($trabajo_id, $accionador, $comentario, $fecha, $precio, $estado) {
        $sql = "INSERT INTO tr_acciones (equipo_identificador, accionador, comentario, fecha, precio, estado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iissii", $trabajo_id, $accionador, $comentario, $fecha, $precio, $estado);
        $stmt->execute();
        if ($stmt->error) {
            die('Error: ' . $stmt->error);
        }
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // métodos obtener
    public function obtenerTrabajosPorRango($fecha_inicio, $fecha_final) {
        $fecha_inicio = date("Y-m-d", strtotime($fecha_inicio));
        $fecha_final = date("Y-m-d", strtotime($fecha_final));
        $sql = "SELECT tr_equipo.id, tr_equipo.identificador, tr_informacion.ingreso, tr_informacion.egreso, tr_informacion.estado, tr_informacion.precio 
                FROM tr_informacion 
                INNER JOIN tr_equipo 
                ON tr_informacion.identificador_trabajo = tr_equipo.id 
                WHERE ingreso BETWEEN '$fecha_inicio' AND '$fecha_final'";
        $resultado = mysqli_query($this->conn, $sql);
        $registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return json_encode($registros);
    }
}
?>