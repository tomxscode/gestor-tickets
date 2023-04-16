document.addEventListener("DOMContentLoaded", function () {
    obtenerClientes();
});

function obtenerClientes() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../core/clientes/obtener_clientes.php");
    xhr.responseType = "json";
    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = xhr.response;
            console.log(data);
            for (var i = 0; i < data.length; i++) {
                var cliente = data[i];
                var html = "<tr><td>" + cliente.id + "</td><td>" + cliente.nombre + "</td><td>" + cliente.telefono + "</td></tr>";
                document.querySelector("#tabla-clientes").innerHTML += html;
            }
        } else {
            console.log("Error al obtener los archivos: " + xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.log("Error de red al obtener los archivos");
    };
    xhr.send();
}