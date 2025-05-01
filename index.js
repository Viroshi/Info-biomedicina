const selectCity = document.getElementById("inputCity");
const selectState = document.getElementById("inputState");

fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
.then(res => res.json())
.then(estados => {
  estados.forEach(estado => {
    let option = document.createElement("option");
    option.value = estado.nome;           // nome para o PHP
    option.textContent = estado.nome;
    option.dataset.id = estado.id;        // id para o JS
    selectState.appendChild(option);
  });
});

selectState.addEventListener("change", () => {
  const selectedOption = selectState.options[selectState.selectedIndex];
  const estadoId = selectedOption.dataset.id;

  selectCity.innerHTML = "<option value=''>Carregando...</option>";
  selectCity.disabled = true;

  if (!estadoId) return;

  fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios`)
    .then(res => res.json())
    .then(cidades => {
      selectCity.innerHTML = "<option value=''>Selecione uma cidade</option>";
      cidades.forEach(cidade => {
        let option = document.createElement("option");
        option.value = cidade.nome;
        option.textContent = cidade.nome;
        selectCity.appendChild(option);
      });
      selectCity.disabled = false;
    });
});
