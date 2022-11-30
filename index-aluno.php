<?php
session_start();
// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

if (!$_SESSION["id_aluno"]) {
    echo "<script>alert ('Permissao Invalida no Arquivo!'); location.href='index.php';</script>";
} else {

    $sql_aluno = "SELECT * FROM  alunos WHERE id_aluno=" . $_SESSION["id_aluno"];
    //Faz a conexao e executa a instrucao carregada na variavel $sql e os envia para o banco mysql.
    
    $res_aluno = mysqli_query($con, $sql_aluno);
    $row_aluno = mysqli_fetch_array($res_aluno);

    echo '<h1>' . $row_aluno['nome'] . '</h1>';

    $sql_endereco = "SELECT * FROM  enderecos WHERE id_aluno=" . $_SESSION["id_aluno"];
    //Faz a conexao e executa a instrucao carregada na variavel $sql e os envia para o banco mysql.
    $res_endereco = mysqli_query($con, $sql_endereco);
    if (mysqli_num_rows($res_endereco) > 0) {
        $row_endereco = mysqli_fetch_array($res_endereco);
    } else{
        $row_endereco['cep'] ='';
        $row_endereco['rua'] ='';
        $row_endereco['numero'] ='';
        $row_endereco['complemento'] ='';
        $row_endereco['bairro'] ='';
        $row_endereco['cidade'] ='';
        $row_endereco['uf'] ='';
        $row_endereco['ibge'] ='';
    }

?>

<html>

<head>
    <title>Alunos</title>
    <title>Coordenador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
    <!-- Inicio do formulario -->
    <center>
        <div>
            <a href="logout.php">Sair</a>

            <fieldset class="mt-4 border p-2">
                <legend class="font-small"><i class="fas fa-address-card"></i>Endereço:</legend>
                <label>CEP:</label>
                <input name="cep" type="text" value="<?php echo $row_endereco['cep']; ?>" size="10" maxlength="9" />
                </label><br />
                <label>Rua:
                    <input name="rua" type="text" value="<?php echo $row_endereco['rua']; ?>" size="60" /></label><br />
                <label>Número:
                    <input name="numero" type="text" value="<?php echo $row_endereco['numero']; ?>"
                        size="60" /></label><br />
                <label>Complemento:
                    <input name="complemento" type="text" <?php echo $row_endereco['complemento']; ?> size="60"
                    /></label><br />
                <label>Bairro:
                    <input name="bairro" type="text" id="bairro" size="40" /></label><br />
                <label>Cidade:
                    <input name="cidade" type="text" value="<?php echo $row_endereco['cidade']; ?>"
                        size="40" /></label><br />
                <label>Estado:
                    <input name="uf" type="text" value="<?php echo $row_endereco['uf']; ?>" size="2" /></label><br />
                <label>IBGE:
                    <input name="ibge" type="text" value="<?php echo $row_endereco['ibge']; ?>"
                        size="8" /></label><br />
            </fieldset>

        </div>
        </div>

        <?php
}
        ?>

<fieldset class="mt-4 border p-2">
                <legend class="font-small"><i class="fas fa-address-card"></i>Notas:</legend>
</fieldset>
</body>

</html>