<?php

$nome_recebido = $_POST['nome'];
$cpf_recebido = $_POST['cpf'];
$logradouro_recebido = $_POST['logradouro'];
$numero_recebido = $_POST['numero'];
$cep_recebido = $_POST['cep'];
$bairro_recebido = $_POST['bairro'];
$salario_recebido = $_POST['salario'];
$dt_admissao_recebido = $_POST['dt_admissao'];
$tipo_recebido = $_POST['tipo'];
$especialidade_recebido = $_POST['especialidade'];
$crm_recebido = $_POST['crm'];
$coremtec_recebido = $_POST['coremtec'];
$coremenf_recebido = $_POST['coremenf'];
$escolaridaderec_recebido = $_POST['escolaridaderec'];
$escolaridadeest_recebido = $_POST['escolaridadeest'];
$formacao_recebido = $_POST['formacao'];

$bdcon2 = pg_connect("host=143.107.137.62 dbname=pedia user=ibm17g8 password=1400") or die("Falha na conexão!" . pg_last_error());

pg_exec($bdcon2, "INSERT INTO funcionario VALUES(nextval('seq_idFunc'),'$cpf_recebido','$nome_recebido', '$salario_recebido', '$dt_admissao_recebido', '$logradouro_recebido', '$numero_recebido', '$cep_recebido', '$bairro_recebido','$tipo_recebido')");

if ($tipo_recebido == "Médico") {
    pg_exec($bdcon2, "INSERT INTO medico VALUES('$crm_recebido', '$especialidade_recebido', currval('seq_idFunc'))");
} elseif ($tipo_recebido == "Técnico de Enfermagem") {

    pg_exec($bdcon2, "INSERT INTO tecnico_enfermagem VALUES('$coremtec_recebido', currval('seq_idFunc'))");
} elseif ($tipo_recebido == "Enfermeiro") {

    pg_exec($bdcon2, "INSERT INTO enfermeiro VALUES('$coremrec_recebido', currval('seq_idFunc'))");
} elseif ($tipo_recebido == "Recepcionista") {

    pg_exec($bdcon2, "INSERT INTO recepcionista VALUES('$escolaridaderec_recebido', currval('seq_idFunc'))");
} elseif ($tipo_recebido == "Estoquista") {

    pg_exec($bdcon2, "INSERT INTO estoquista VALUES('$escolaridadeest_recebido', currval('seq_idFunc'))");
} else {

    pg_exec($bdcon2, "INSERT INTO pedagogo VALUES('$formacao_recebido', currval('seq_idFunc'))");
}

printf("
<head>
<title>Cadastrado</title>
<style>
        .container {
             width: 100vw;
             height: 100vh;
            background: #6C7A89;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center
              }
        .box {
            width: 500px;
            height: 300px;
            background: #fff;
            text-align: center;
            align-items: center;
              }
        .centro{
            text-align: center;
            align-items: center;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;
          }
          </style>
</head>
<body>
<div  class='container'>
  <div class='box'>
          <h1> Cadastro efetuado com sucesso! <h1>

          <a href='/'><button>Pagina Inicial</button></a>
          <a href='formulario_func.html'><button>Cadastro</button></a>
  </div>
</div>
</body>
")
?>