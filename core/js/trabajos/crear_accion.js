const form = document.querySelector("#form-crear_accion");

form.addEventListener("submit", function(event) {
  event.preventDefault();
  crearAccion();
})

function crearAccion() {
  const comentario = form.querySelector("#comentario").value;
  const trabajo_id = form.querySelector("#trabajo_id").value;
  const accionador = form.querySelector("#accionador").value;
  const fecha = form.querySelector("#fecha").value;
  const precio = form.querySelector("#precio").value;

  fetch('../core/trabajos/crear_accion.php', {
    method: 'POST',
    body: JSON.stringify({comentario, trabajo_id, accionador, fecha, precio}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log(data)
    } else {
      console.log("No se pudo crear")
    }
  })
  .catch(error => console.log(error))
}