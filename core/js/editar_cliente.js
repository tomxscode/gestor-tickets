//const form = document.querySelector("#form-crear-cliente");
const btnEditar = document.querySelector("#editar-cliente");
//const btnCrear = document.querySelector("#crear-cliente");

let cliente_id = 0;

function editarClienteX(id) {
  cliente_id = id;
  btnCrear.style.display = "none";
  btnEditar.style.display = "block";
  console.log(cliente_id);
  console.log(buscarClientePorId(cliente_id));
}

btnEditar.addEventListener("click", function(event) {
  event.preventDefault();
  editarCliente(cliente_id);
})



function editarCliente(cliente_id) {
  const nombre = form.querySelector("#nombre").value;
  const telefono = form.querySelector("#telefono").value;

  fetch('../core/clientes/editar_cliente.php', {
    method: 'POST',
    body: JSON.stringify({cliente_id, nombre, telefono}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data=> {
    if (data.success) {
      obtenerClientes();
      document.querySelector("#infoContainer").innerHTML = "<div class='alert alert-success'>Cliente editado con éxito</div>";
      form.reset();
    } else {
      const errores = data.errores;
      const erroresContainer = document.querySelector("#errores");
      erroresContainer.innerHTML = '';
      errores.forEach(error => {
        const errorElement = document.createElement('div');
        errorElement.classList.add('alert', 'alert-danger');
        errorElement.textContent = error;
        erroresContainer.appendChild(errorElement);
      });
    }
  })
  .catch(error => console.log(error));
  btnEditar.style.display = "none";
  btnCrear.style.display = "block";
}

