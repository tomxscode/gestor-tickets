const btnEditar = document.querySelector("#editar-equipo");
const btnRegistrar = document.querySelector("#registrar-equipo");

let equipo_id = 0;

function prepararEdicion(id) {
  equipo_id = id;
  btnRegistrar.style.display = "none";
  btnEditar.style.display = "block";
  console.log(buscarEquipoPorId(id));
}