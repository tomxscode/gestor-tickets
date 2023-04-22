document.addEventListener("DOMContentLoaded", function () {
  obtenerEquipos();
});

const equiposPorPagina = 10;
let equipos = [];
let totalPaginas = 0;

function obtenerEquipos() {
  fetch('../core/equipos/obtener_equipos.php')
    .then(response => response.json())
    .then(data => {
      data.sort(function(a, b) {
        return a.id - b.id;
      });

      equipos = data;
      console.log(data);

      totalPaginas = Math.ceil(equipos.length / equiposPorPagina);
      pintarTabla(1);
      pintarBotonesPaginador();
    })
    .catch(error => console.error('Error en la petición' + error));
}

function pintarTabla(pagina) {
  const tabla = document.querySelector('#tabla-equipos');
  while (tabla.firstChild) {
    tabla.removeChild(tabla.firstChild);
  }
  const inicio = (pagina - 1) * equiposPorPagina;
  const fin = Math.min(inicio + equiposPorPagina, equipos.length);
  const datosPagina = equipos.slice(inicio, fin);

  datosPagina.forEach(function (equipo) {
    const tr = document.createElement('tr');
    tr.innerHTML = "<td>" + equipo.id + "</td><td>" + equipo.marca + " " + equipo.modelo + "</td><td>" + equipo.serial + "</td><td>" + equipo.nombre_dueno + "</td><td><button class='btn btn-danger btn-sm' onclick='eliminarEquipo(" + equipo.id + ")'><i class='zmdi zmdi-delete'></i></button> <button class='btn btn-info btn-sm' onclick='prepararEdicion(" + equipo.id + ")'><i class='zmdi zmdi-edit'></i></button></td>";
    tabla.appendChild(tr);
  });
}

function pintarBotonesPaginador() {
  const paginador = document.querySelector('#paginador');
  while (paginador.firstChild) {
    paginador.removeChild(paginador.firstChild);
  }
  for (let i = 1; i <= totalPaginas; i++) {
    const li = document.createElement('li');
    li.innerHTML = "<span class='page-link'>" + i + "</span>";
    li.className = 'page-item';
    paginador.appendChild(li);
  }

  paginador.querySelector('li:first-child').classList.add('active');
  paginador.querySelectorAll('li').forEach(function (li) {
    li.addEventListener('click', function() {
      const pagina = parseInt(li.querySelector('span').textContent);
      pintarTabla(pagina);
      paginador.querySelectorAll('li').forEach(function (li) {
        li.classList.remove('active');
      });
      li.classList.add('active');
    })
  })
}