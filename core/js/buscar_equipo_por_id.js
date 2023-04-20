function buscarEquipoPorId(id) {
  return new Promise((resolve, reject) => {
    fetch('../core/equipos/buscar_equipo_por_id.php', {
      method: 'POST',
      body: JSON.stringify({ equipo_id: id }),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const equipo = data.equipo;
          resolve(equipo);
        } else {
          console.log(data.mensaje);
          reject(data.mensaje);
        }
      })
      .catch(error => {
        console.log(error);
        reject(error);
      })
  });
}