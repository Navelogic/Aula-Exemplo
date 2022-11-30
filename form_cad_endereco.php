<?php
$id_aluno = $_GET['id_aluno'];
?>
<html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <!-- Inicio do formulario -->
    <center>
    <div style="width:50vh;">
      <form method="post" action="cad-endereco.php">
      <label>ID do Aluno:
        <input name="id_aluno" type="text" value="<?= $id_aluno ?>" readonly/>
      
      </label><br />
        <label class="">Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Número:
        <input name="numero" type="text" /></label><br />
        <label>Complemento:
        <input name="complemento" type="text" size="20"/></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>IBGE:
        <input name="ibge" type="text" id="ibge" size="8" /></label><br />
        <button type="subimit">Cadastrar Endereço</button>
      </form>
    </div>
    </body>

    </html>
    