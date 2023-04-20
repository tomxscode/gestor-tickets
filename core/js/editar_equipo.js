const btnEditar = document.querySelector("#editar-equipo");
const btnRegistrar = document.querySelector("#registrar-equipo");
const formEdit = document.querySelector("#form-crear-equipo");

let equipo_id = 0;
let equipoConsultado;

function prepararEdicion(id) {
  equipo_id = id;
  btnRegistrar.style.display = "none";
  btnEditar.style.display = "block";
  buscarEquipoPorId(id).then(equipo => {
    equipoConsultado = equipo;
    // Modificación del DOM
    document.querySelector("#marca").value = equipoConsultado.marca;
    document.querySelector("#modelo").value = equipoConsultado.modelo;
    document.querySelector("#serialnum").value = equipoConsultado.serial;
    document.querySelector("#detalles").value = equipoConsultado.comentarios;
    document.querySelector("#cliente-select").value = equipoConsultado.dueno;
  });
}

formEdit.addEventListener('submit', (event) => {
  event.preventDefault();
  editarEquipo(equipo_id);
})


function editarEquipo(equipo_id) {
  const marca = document.querySelector("#marca").value;
  const modelo = document.querySelector("#modelo").value;
  const serial = document.querySelector("#serialnum").value;
  const comentarios = document.querySelector("#detalles").value;
  const dueno = document.querySelector("#cliente-select").value;

  fetch('../core/equipos/editar_equipo.php', {
    method: 'POST',
    body: JSON.stringify({equipo_id, marca, modelo, serial, dueno, comentarios}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      obtenerEquipos();
      formEdit.reset();
    } else {
      const errores = data.errores;
    }
  })
  .catch(error => console.log(error));
  btnEditar.style.display = "none";
  btnRegistrar.style.display = "block";
}