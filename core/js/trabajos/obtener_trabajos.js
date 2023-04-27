let alertContainer = document.querySelector("#alert-container");
document.addEventListener("DOMContentLoaded", function () {
  let hoy = new Date();

  // Obtener la fecha de hace una semana
  let semanaPasada = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate() - 7);

  // Formatear las fechas
  let hoyFormateado = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
  let semanaFormateada = semanaPasada.getFullYear() + '-' + (semanaPasada.getMonth() + 1) + '-' + semanaPasada.getDate();
  
  obtenerTrabajos(semanaFormateada, hoyFormateado, 1);
  console.log(hoyFormateado,semanaFormateada)
})


const btnFiltrar = document.querySelector("#btnFiltrar");
btnFiltrar.addEventListener('click', function () {
  let fecha_inicio = document.querySelector("#fecha_inicio").value;
  let fecha_final = document.querySelector("#fecha_final").value;
  console.log(fecha_inicio, fecha_final);
  obtenerTrabajos(fecha_inicio, fecha_final, 0);
})

function obtenerTrabajos(fecha_inicio, fecha_final, estado) {
  fetch('../core/trabajos/obtener_rango.php', {
    method: 'POST',
    body: JSON.stringify({ fecha_inicio, fecha_final }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
      const tabla = document.querySelector("#tabla-trabajos");
      // Limpiar
      while (tabla.firstChild) {
        tabla.removeChild(tabla.firstChild);
      }
      data.forEach(trabajo => {
        console.log(trabajo)
        const tr = document.createElement('tr');
        tr.innerHTML += "<td>" + trabajo.id + "</td>";
        tr.innerHTML += "<td>" + trabajo.identificador + "</td>";
        tr.innerHTML += "<td>" + trabajo.ingreso + "</td>";
        if (trabajo.egreso == "0000-00-00") {
          tr.innerHTML += "<td>Aún no entregado</td>";
        } else {
          tr.innerHTML += "<td>" + trabajo.egreso + "</td>";
        }
        tr.innerHTML += "<td>" + trabajo.diag_inicial + "</td>";
        let precioChileno = parseFloat(trabajo.precio).toLocaleString('es-CL', { style: 'currency', currency: 'CLP' });
        tr.innerHTML += "<td>" + precioChileno + "</td>";
        if (trabajo.estado == 1) {
          tr.innerHTML += "<td><span class='btn btn-success'>Terminado</span></td>";
        } else {
          tr.innerHTML += "<td><span class='btn btn-danger'>No terminado</span></td>";
        }
        tabla.appendChild(tr);
      });
    })
    .catch(error => console.error('Error en la petición' + error));
    if (estado) {
      alertContainer.innerHTML = "<div class='alert alert-info' role='alert'>No se ingresó ninguna fecha, por lo que se verán los trabajos de la última semana</div>"; 
    } else {
      alertContainer.innerHTML = "";
    }
}