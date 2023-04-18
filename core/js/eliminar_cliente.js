function eliminarCliente(cliente_id) {
  if (confirm("¿Está seguro de eliminar este cliente?")) {
    if (!cliente_id) {
      console.error("No se proporcionó una id");
      return;
    }
    fetch('../core/clientes/eliminar_cliente.php', {
      method: 'POST',
      body: JSON.stringify({cliente_id}),
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log("Exito" + data.mensaje);
        obtenerClientes();
        document.querySelector("#infoContainer").innerHTML = "<div class='alert alert-success'>"+ data.mensaje +"</div>";
      } else {
        console.log("Fracaso")
        document.querySelector("#infoContainer").innerHTML = "<div class='alert alert-danger'>"+ data.mensaje +"</div>";
      }
    })
    //.catch(error => console.log(error)); 
  }
}