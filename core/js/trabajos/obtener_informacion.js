const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('trabajo');
console.log(id);

document.addEventListener("DOMContentLoaded", function() {
  pintarInformacion(id);
})

function pintarInformacion(trabajo_id) {
  fetch('../core/trabajos/obtener_informacion.php', {
    method: 'POST',
    body: JSON.stringify({trabajo_id}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    let info = data.informacion;
    let titulo = document.querySelector("#identificador");
    let ingreso = document.querySelector("#ingreso");
    let estado = document.querySelector("#estado");
    titulo.innerHTML = info.identificador;
    ingreso.innerHTML = info.ingreso;

    // comprobación de estado:
    if (info.estado) {
      estado.innerHTML = "Terminado";
      estado.classList.add('btn', 'btn-success');
    } else {
      estado.innerHTML = "En proceso";
      estado.classList.add('btn', 'btn-info');
    }
  })
  .catch(error => console.error(error));
}