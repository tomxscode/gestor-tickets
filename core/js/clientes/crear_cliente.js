const form = document.querySelector("#form-crear-cliente");
const btnCrear = document.querySelector("#crear-cliente");

btnCrear.addEventListener("click", function(event) {
  event.preventDefault();
  crearCliente();
})

function crearCliente() {
  const nombre = form.querySelector("#nombre").value;
  const telefono = form.querySelector("#telefono").value;

  fetch('../core/clientes/crear_cliente.php', {
    method: 'POST',
    body: JSON.stringify({nombre, telefono}),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      //window.location.href = 'index.php';
      console.log("Exito");
      //location.reload();
      obtenerClientes();
      form.reset();
      document.querySelector("#infoContainer").innerHTML = "<div class='alert alert-success'>Cliente creado exitosamente</div>";
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
}

