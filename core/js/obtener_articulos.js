$(document).ready(function() {
    obtenerClientes();
})

function obtenerClientes() {
    $.ajax({
        url: "../core/clientes/obtener_clientes.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data);
            // si se obtuvieron resultados
            for (var i = 0; i < data.length; i++) {
                var cliente = data[i];
                var html = "<tr><td>" + cliente.id + "</td><td>" + cliente.nombre + "</td><td>" + cliente.telefono + "</td></tr>"
                $("#tabla-clientes").append(html);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error al obtener los archivos: " + textStatus);
        }
    })
}