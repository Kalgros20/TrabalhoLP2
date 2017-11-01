function funcao() {
  var selectCargo = document.getElementById("cargo");
  var divSelectCargo = document.getElementById("cargos");
  var valorCargo = selectCargo.value;
  var supervisores = ["Joao Vidotti", "Carlos Tibério"];
  var gerentes = ["Fernando Donizete", "Marcelo Chisté"];

    
  if(valorCargo == 4)
    {
      mostraSupervisor(divSelectCargo,supervisores);     
      mostraGerente(divSelectCargo,gerentes);     
  
    }else if(valorCargo == 3){

    }
    
  }

  function mostraSupervisor(divSelectCargo,supervisores){
    var selectSupervisor = document.createElement("select");
    selectSupervisor.className = "form-control";
    selectSupervisor.name = "supervisor";

    var divSupervisor = document.createElement("div");
    divSupervisor.className = "form-group";

    var labelSupervisor = document.createElement("label");
    labelSupervisor.textContent = "Qual o seu supervisor:";

    divSelectCargo.appendChild(divSupervisor);
    divSupervisor.appendChild(labelSupervisor);
    divSupervisor.appendChild(selectSupervisor);

    for (var i = 0; i < supervisores.length; i++) {
      var option = document.createElement("option");
      option.value = i;
      option.text = supervisores[i];
      selectSupervisor.appendChild(option);
    
    }
  }

    function mostraGerente(divSelectCargo,gerentes){
      var selectSupervisor = document.createElement("select");
      selectSupervisor.className = "form-control";
      selectSupervisor.name = "supervisor";
  
      var divSupervisor = document.createElement("div");
      divSupervisor.className = "form-group";
  
      var labelSupervisor = document.createElement("label");
      labelSupervisor.textContent = "Qual o seu gerente:";
  
      divSelectCargo.appendChild(divSupervisor);
      divSupervisor.appendChild(labelSupervisor);
      divSupervisor.appendChild(selectSupervisor);
  
      for (var i = 0; i < gerentes.length; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.text = gerentes[i];
        selectSupervisor.appendChild(option);

    }
  }

  document.getElementById("cargo").addEventListener("change", funcao);
  