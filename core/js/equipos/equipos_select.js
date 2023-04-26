const equiposSelect = document.getElementById("equipos-select");
const equipoInput = document.getElementById("equipos-input");

fetch('../core/equipos/obtener_equipos.php')
  .then((response) => response.json())
  .then((data) => {
    data.forEach((equipo) => {
      const option = document.createElement("option");
      option.value = equipo.id;
      option.text = `${equipo.id} - ${equipo.marca} ${equipo.modelo} (${equipo.serial})`;
      equiposSelect.add(option);
    });
  });

  equipoInput.addEventListener("input", (event) => {
  const inputText = event.target.value.toLowerCase();
  const options = equiposSelect.options;
  for (let i = 0; i < options.length; i++) {
    const optionText = options[i].text.toLowerCase();
    if (optionText.includes(inputText)) {
      options[i].hidden = false;
    } else {
      options[i].hidden = true;
    }
  }
});

equiposSelect.addEventListener("change", (event) => {
  const selectedOption = event.target.options[event.target.selectedIndex];
  equipoInput.value = selectedOption.text;
})