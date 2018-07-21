function validar() {
    var nome = cadastro.nome.value;
    var cpf = cadastro.cpf.value;
    var logradouro = cadastro.logradouro.value;
    var numero = cadastro.numero.value;
    var cep = cadastro.cep.value;
    var bairro = cadastro.bairro.value;
    var salario = cadastro.salario.value;
    var data = cadastro.dt_admissao.value;
    var tipo = cadastro.tipo.value;

    var especialidade = cadastro.especialidade.value;
    var crm = cadastro.crm.value;
    var coremenf = cadastro.coremenf.value;
    var coremtec = cadastro.coremtec.value;
    var escolaridaderec = cadastro.escolaridaderec.value;
    
    var escolaridadeest = cadastro.escolaridadeest.value;

    var formacao = cadastro.formacao.value;



    if (nome == "") {
        alert('Preencha o campo nome');
        cadastro.nome.focus();
        return false;
    }
    if (cpf == "") {
        alert('Preencha o campo cpf');
        cadastro.cpf.focus();
        return false;
    }
    if (logradouro == "") {
        alert('Preencha o campo Logradouro');
        cadastro.logradouro.focus();
        return false;
    }
    if (numero == "") {
        alert('Preencha o campo Numero');
        cadastro.numero.focus();
        return false;
    }
    if (cep == "") {
        alert('Preencha o campo CEP');
        cadastro.cep.focus();
        return false;
    }
    if (bairro == "") {
        alert('Preencha o campo Bairro');
        cadastro.bairro.focus();
        return false;
    }
    if (salario == "") {
        alert('Preencha o campo Salario');
        cadastro.salario.focus();
        return false;
    }
    if (tipo == "") {
        alert('Preencha o campo Tipo');
        cadastro.tipo.focus();
        return false;
    }


    var option = document.getElementById("tipo").value;

    if (option == 'Médico') {
        if (especialidade == "") {
            alert('Preencha o campo Especialidade');
            cadastro.especialidade.focus();
            return false;
        }
        if (crm == "") {
            alert('Preencha o campo Crm');
            cadastro.crm.focus();
            return false;
        }

    }
    else if (option == 'Enfermeiro') {
        if (coremenf == "") {
            alert('Preencha o campo Corem');
            cadastro.coremenf.focus();
            return false;
        }
    }
    else if (option == 'Técnico de Enfermagem') {
        if (coremtec == "") {
            alert('Preencha o campo Corem');
            cadastro.coremtec.focus();
            return false;
        }
    }
    else if (option == "Estoquista") {
        if (escolaridadeest == "") {
            alert('Preencha o campo Escolaridade');
            cadastro.escolaridadeest.focus();
            return false;
        }
    }
    else if (option == 'Recepcionista') {
        if (escolaridaderec == "") {
            alert('Preencha o campo Escolaridade');
            cadastro.escolaridaderec.focus();
            return false;
        }
    }
    else if (option == 'Pedagogo') {
        if (formacao == "") {
            alert('Preencha o campo Formacao');
            cadastro.formacao.focus();
            return false;
        }
    }
}

