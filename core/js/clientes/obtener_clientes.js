document.addEventListener("DOMContentLoaded", function () {
    obtenerClientes();
});

// AL MODIFICAR ESTA VARIABLE SE CAMBIA LA CANTIDAD DE RESULTADOS POR PÁGINA
const clientesPorPagina = 10;
let clientes = [];
let totalPaginas = 0;

function obtenerClientes() {
    fetch('../core/clientes/obtener_clientes.php')
        .then(response => response.json())
        .then(data => {
            // Ordenamos los datos por la ID
            data.sort(function(a, b) {
                return a.id - b.id;
            });

            // Guardamos la respuesta en una variable global
            clientes = data;

            // Calculamos la cantidad de páginas necesarias
            totalPaginas = Math.ceil(clientes.length / clientesPorPagina);

            // Pinta la tabla con los primeros datos
            pintarTabla(1);
            // Pinta los botones del paginador
            pintarBotonesPaginador();
        })
        .catch(error => console.error('Error en la petición: ', error));
}

function pintarTabla(pagina) {
    // Limpiamos la tabla
    const tabla = document.querySelector('#tabla-clientes');
    while (tabla.firstChild) {
        tabla.removeChild(tabla.firstChild);
    }

    // Obtiene los datos de la página actual
    const inicio = (pagina - 1) * clientesPorPagina;
    const fin = Math.min(inicio + clientesPorPagina, clientes.length);
    const datosPagina = clientes.slice(inicio, fin);

    // Pinta los datos en una tabla
    datosPagina.forEach(function (cliente) {
        const tr = document.createElement('tr');
        tr.innerHTML = "<td>" + cliente.id + "</td><td>" + cliente.nombre + "</td><td>" + cliente.telefono + "</td><td><button class='btn btn-danger btn-sm' onclick='eliminarCliente(" + cliente.id + ")'>Eliminar</button> <button class='btn btn-info btn-sm' onclick='editarClienteX(" + cliente.id + ")'>Modificar</button></td>";
        tabla.appendChild(tr);
    });
}

function pintarBotonesPaginador() {
    // Borra los botones
    const paginador = document.querySelector('#paginador');
    while (paginador.firstChild) {
        paginador.removeChild(paginador.firstChild);
    }

    // Crea los botones
    for (let i = 1; i <= totalPaginas; i++) {
        const li = document.createElement('li');
        li.innerHTML = "<span class='page-link'>" + i + "</span>";
        li.className = 'page-item';
        paginador.appendChild(li);
    }

    // Agrega la clase "active" al primer botón
    paginador.querySelector('li:first-child').classList.add('active');

    // Asigna el evento "click" a los botones del paginador
    paginador.querySelectorAll('li').forEach(function (li) {
        li.addEventListener('click', function () {
            // Obtiene el número de página del botón
            const pagina = parseInt(li.querySelector('span').textContent);

            // Pinta la tabla con los datos de la página seleccionada
            pintarTabla(pagina);

            // Agrega la clase "active" al botón seleccionado y la quita a los demás
            paginador.querySelectorAll('li').forEach(function (li) {
                li.classList.remove('active');
            });
            li.classList.add('active');
        });
    });
}