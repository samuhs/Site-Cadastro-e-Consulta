<?php
  printf("
  <head>
  <title>Confirmação</title>
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
              height: 455px;
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
  
  <div class='container'>
  <div class='box'>
  ");
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
        $link;

        $bdcon2 = pg_connect("host=143.107.137.62 dbname=pedia user=ibm17g8 password=1400") or die ("Falha na conexão!".pg_last_error());

        $result1 = pg_exec($bdcon2, "SELECT * FROM funcionario WHERE cpf  = '$cpf_recebido'");

        if(pg_numrows($result1) != 0){

          echo 'O CPF digitado já se encontra cadastrado';

        ?>
        <br><br>
        <input type='button' value='Voltar' onclick='history.go(-1)' />

        <?php

        }else{

        ?>

        <h1> Confira os dados de cadastro </h1>
        <table border='1' align='center'>
        <tr>
          <th>Nome:</th>
          <td><?php echo $nome_recebido ?></td>
        </tr>
        <tr>
          <th>Cpf:</th>
          <td><?php echo $cpf_recebido ?></td>
        </tr>
        <tr>
           <th>Logradouro:</th>
           <td><?php echo $logradouro_recebido ?></td>
        </tr>
        <tr>
           <th>Numero:</th>
           <td><?php echo $numero_recebido ?></td>
        </tr>
        <tr>
           <th>Cep:</th>
           <td><?php echo $cep_recebido ?></td>
        </tr>
        <tr>
           <th>Bairro:</th>
           <td><?php echo $bairro_recebido ?></td>
        </tr>
        <tr>
           <th>Salario:</th>
           <td><?php echo $salario_recebido ?></td>
        </tr>
        <tr>
           <th>Data de admissão:</th>
           <td><?php echo $dt_admissao_recebido ?></td>
        </tr>
        <tr>
           <th>Tipo:</th>
           <td><?php echo $tipo_recebido ?></td>
        </tr>
        

        

        <?php

          if($tipo_recebido == "Médico"){
            printf("
            <tr>
              <th>Especialidade:</th>
              <td> $especialidade_recebido</td>
            </tr>
            <tr>
              <th>Crm:</th>
              <td> $crm_recebido</td>
            </tr>
            ");
          }elseif($tipo_recebido == "Técnico de Enfermagem"){
            printf("
            <tr>
              <th>Corem:</th>
              <td> $coremtec_recebido</td>
            </tr>
            ");
          }elseif($tipo_recebido == "Enfermeiro"){
            printf("
            <tr>
              <th>Corem:</th>
              <td> $coremenf_recebido</td>
            </tr>
            ");
          }elseif ($tipo_recebido == "Recepcionista") {
            printf("
            <tr>
              <th>Escolaridade:</th>
              <td> $escolaridaderec_recebido</td>
            </tr>
            ");
          }elseif ($tipo_recebido == "Estoquista") {
            printf("
            <tr>
              <th>Escolaridade:</th>
              <td> $escolaridadeest_recebido</td>
            </tr>
            ");
          }else{
            printf("
            <tr>
              <th>Formação:</th>
              <td> $formacao_recebido</td>
            </tr>
            ");
          }

  
        ?>
</table>

<br><br>
        <input type='button' value='Corrigir' onclick='history.go(-1)' />

        <form action = "conf_cadastro.php" method = "POST">

            <input type="hidden" name="nome" value="<?php echo $nome_recebido;?>">
            <input type="hidden" name="cpf" value="<?php echo $cpf_recebido;?>">
            <input type="hidden" name="logradouro" value="<?php echo $logradouro_recebido;?>">
            <input type="hidden" name="numero" value="<?php echo $numero_recebido;?>">
            <input type="hidden" name="cep" value="<?php echo $cep_recebido;?>">
            <input type="hidden" name="bairro" value="<?php echo $bairro_recebido;?>">
            <input type="hidden" name="salario" value="<?php echo $salario_recebido;?>">
            <input type="hidden" name="dt_admissao" value="<?php echo $dt_admissao_recebido;?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo_recebido;?>">
            <input type="hidden" name="especialidade" value="<?php echo $especialidade_recebido;?>">
            <input type="hidden" name="crm" value="<?php echo $crm_recebido;?>">
            <input type="hidden" name="coremtec" value="<?php echo $coremtec_recebido;?>">
            <input type="hidden" name="coremenf" value="<?php echo $coremenf_recebido;?>">
            <input type="hidden" name="escolaridaderec" value="<?php echo $escolaridaderec_recebido;?>">
            <input type="hidden" name="escolaridadeest" value="<?php echo $escolaridadeest_recebido;?>">
            <input type="hidden" name="formacao" value="<?php echo $formacao_recebido;?>">
        <br>
        <input type = "submit" value = "Cadastrar">

        <?php
    printf("
    </div>
    </div>
");
        }

        pg_close($bdcon2);
        ?>
