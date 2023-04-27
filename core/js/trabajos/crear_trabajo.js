const btnCrear = document.querySelector("#btn-crear");
const form = document.querySelector("#form-ingreso");

let trabajo_id = 0;

form.addEventListener("submit", function(event) {
  event.preventDefault();
  crearOrden();
})

function crearOrden() {
  const cliente_id = form.querySelector("#cliente-select").value;
  const equipo_id = form.querySelector("#equipos-select").value;

  fetch('../core/trabajos/crear_registro_trabajo.php', {
    method: 'POST',
    body: JSON.stringify({cliente_id, equipo_id}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log(data)
      trabajo_id = data.id_trabajo;
      crearInfo()
    } else {
      console.log("No se pudo crear");
    }
  })
  .catch(error => console.log(error))
}

function crearInfo() {
  const diagnostico = form.querySelector("#diaginicial").value;
  let hoy = new Date();
  let hoyFormateado = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
  fetch('../core/trabajos/crear_informacion_trabajo.php', {
    method: 'POST',
    body: JSON.stringify({diagnostico, hoyFormateado, trabajo_id}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log(data)
      mostrarModalExito("\
        La orden de trabajo fue ingresada exitosamente <br> \
        Vea los trabajos ingresados cliqueando <a href='index.php'>aqui</a>");
    } else {
      console.log("Error al crear la información")
    }
  })
  .catch(error => console.log(error))
}

function mostrarModalExito(text) {
  const alertContainer = document.querySelector("#alert-container");
  alertContainer.innerHTML = "";
  alertContainer.innerHTML += "<div class='alert alert-success' role='alert'>" + text + "</div>";
}