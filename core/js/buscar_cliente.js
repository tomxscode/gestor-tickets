function buscarClientePorId(id) {
  fetch('../core/clientes/buscar_cliente_por_id.php', {
    method: 'POST',
    body: JSON.stringify({cliente_id: id}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      const cliente = data.cliente;
      document.querySelector("#nombre").value = cliente.nombre;
      document.querySelector("#telefono").value = cliente.telefono;
      console.log(cliente.id, cliente.nombre, cliente.telefono);
      return cliente;
    } else {
      console.log(data.mensaje);
    }
  })
  .catch(error => console.log(error))
}