const clientesSelect = document.getElementById("cliente-select");
const clienteInput = document.getElementById("cliente-input");

fetch('../core/clientes/obtener_clientes.php')
  .then((response) => response.json())
  .then((data) => {
    // Iteramos sobre cada cliente
    data.forEach((cliente) => {
      const option = document.createElement("option");
      option.value = cliente.id;
      option.text = `${cliente.id} - ${cliente.nombre}`;
      clientesSelect.add(option);
    });
  });

clienteInput.addEventListener("input", (event) => {
  const inputText = event.target.value.toLowerCase();
  const options = clientesSelect.options;
  for (let i = 0; i < options.length; i++) {
    const optionText = options[i].text.toLowerCase();
    if (optionText.includes(inputText)) {
      options[i].hidden = false;
    } else {
      options[i].hidden = true;
    }
  }
});

clientesSelect.addEventListener("change", (event) => {
  const selectedOption = event.target.options[event.target.selectedIndex];
  clienteInput.value = selectedOption.text;
})