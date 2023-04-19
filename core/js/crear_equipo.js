const form = document.querySelector('#form-crear-equipo');
const btnCrear = document.querySelector('#registrar-equipo');

btnCrear.addEventListener('click', function(event) {
  event.preventDefault();
  crearEquipo();
})

function crearEquipo() {
  const marca = form.querySelector('#marca').value;
  const modelo = form.querySelector('#modelo').value;
  const serial = form.querySelector('#serialnum').value;
  const cliente_id = form.querySelector('#cliente-select').value;
  const observaciones = form.querySelector('#detalles').value;

  fetch('../core/equipos/crear_equipo.php', {
    method: 'POST',
    body: JSON.stringify({marca, modelo, serial, cliente_id, observaciones}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      obtenerEquipos();
      document.querySelector("#alert-container").innerHTML = "<div class='alert alert-success'>Equipo creado con éxito</div>";
      form.reset();
    } else {
      console.log("Error");
    }
  })
  .catch(error => console.log(error))
}