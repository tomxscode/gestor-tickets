console.log(id);

document.addEventListener('DOMContentLoaded', function() {
  pintarTareas();
})

function pintarTareas() {
  let t_id = id; // Viene desde obtener_informacion.js

  fetch('../core/trabajos/obtener_accion.php', {
    method: 'POST',
    body: JSON.stringify({t_id}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    let container = document.querySelector("#accion-container");
    let elementosHtml = data.informacion.map(elemento => {
      let estadoHtml = elemento.estado == 1 ? 'checked' : '';
      let informacionHtml = `$${elemento.precio} - ${elemento.fecha}`;
      return `
        <div class="accion bg-secondary p-2 rounded mt-2">
          <input class="form-check-input m-1" type="checkbox" ${estadoHtml}>
          <label class="form-check-label">${elemento.comentario}</label>
          <div class="informacion">${informacionHtml}</div>
        </div>
      `;
    });
    container.innerHTML = elementosHtml.join('');
  })
  .catch(error => console.error(error))
}