function eliminarEquipo(equipo_id) {
  if (confirm("¿Está seguro de eliminar este equipo?")) {
    if (!equipo_id) {
      console.error("No se proporcionó un id");
      return;
    }
    fetch('../core/equipos/eliminar_equipo.php', {
      method: 'POST',
      body: JSON.stringify({equipo_id}),
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log('Exito');
        obtenerEquipos();
        // Actualizar equipos
      } else {
        console.log("Fracaso");
      }
    })
  }
}