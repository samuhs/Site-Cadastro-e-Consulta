<?php

$consulta_id = $_POST['Consulta_id'];
$consulta_cpf = $_POST['Consulta_cpf'];
$consulta_nome = $_POST['Consulta_nome'];
$consulta_salario = $_POST['Consulta_salario'];
$consulta_tipo = $_POST['Consulta_tipo'];
$recebe2 = $_POST['filtro'];


$conex1 = pg_connect("host = 143.107.137.62
    port = 5432
    dbname = pedia
    user = ibm17g8
    password = 1400")
or die("Falha na conexão!" . pg_last_error());

if ($recebe2 == 'id') {
    $result1 = pg_exec($conex1, "SELECT * FROM funcionario WHERE idfuncionario ='$consulta_id' ");
} 

elseif ($recebe2 == 'cpf') {
    $result1 = pg_exec($conex1, "SELECT * FROM funcionario WHERE cpf ='$consulta_cpf' ");
} 

elseif ($recebe2 == 'tipo' ) {
    $result1 = pg_exec($conex1, "SELECT * FROM funcionario WHERE tipo ='$consulta_tipo' ");
} 

elseif ($recebe2 == 'nome') {
    $result1 = pg_exec($conex1, "SELECT * FROM funcionario WHERE nome LIKE '%".$consulta_nome."%' ");
}
elseif ($recebe2 == 'salario') {
    $result1 = pg_exec($conex1, "SELECT * FROM funcionario WHERE salario = '$consulta_salario' ");
} 

printf("
<head>
<title>Resultado</title>
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
            width: 1000px;
            height: 500px;
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
");

printf("
<div class='container'>
<div class='box'>
");
$tot_tuplas = pg_numrows($result1);
if ($tot_tuplas == 0) {
    printf("
        <h2> Pesquisa não realizada <h2>
        <a href='/'><button class='bt'>Pagina Inicial</button></a>
        <a href='consulta_f.html'><button class='bt'>Nova Pesquisa</button></a>
        ");
   

} else {
    

    printf("
    <h1> Resultado<h1>
    <div class='centro'>
    <table border='1'  align='center'>
    <tr>
    <th>ID </th>
    <th>Nome</th>
    <th>CPF</th>
    <th>Salario</th>
    <th>Data Admissão</th>
    <th>Logradouro</th>
    <th>Numero</th>
    <th>Cep</th>
    <th>Bairro</th>
    </tr>
    ");
   
   
    for ($tupla = 0; $tupla < $tot_tuplas; $tupla++) {
        $id = pg_result($result1, $tupla, 0);
        $cpf = pg_result($result1, $tupla, 1);
        $nome = pg_result($result1, $tupla, 2);
        $salario = pg_result($result1, $tupla, 3);
        $dta_adm = pg_result($result1, $tupla, 4);
        $logradouro = pg_result($result1, $tupla, 5);
        $numero = pg_result($result1, $tupla, 6);
        $cep = pg_result($result1, $tupla, 7);
        $bairro= pg_result($result1, $tupla, 8);
        printf("

            <tr>
            <td>$id</td>
            <td>$nome</td>
            <td>$cpf</td>
            <td>$salario</td>
            <td>$dta_adm</td>
            <td>$logradouro</td>
            <td>$numero</td>
            <td>$cep</td>
            <td>$bairro</td>
            </tr>");}

    printf(" 
    </table>
    
    <a href='/'><button class='bt'>Pagina Inicial</button></a>
    <a href='consulta_f.html'><button class='bt'>Nova Pesquisa</button></a>
    ");
}
printf("

            </div>
        </div>
    </div>
");
pg_close($conex1);
?>