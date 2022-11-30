<?php

// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

//Recupera os dados enviados via POST
// recebe o Nome
$id_aluno = $_POST["id_aluno"];
// Dados do endereço do Aluno
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$ibge = $_POST['ibge'];

//montar a query sql de gravação recebendo as variaveis via post
$sql = "insert into enderecos values (null,'$id_aluno','$cep','$rua','$numero','$complemento','$bairro','$cidade','$uf','$ibge')";

//Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.

//Recupera o Ultimo ID inserido no Banco
    if (mysqli_query($con, $sql)) { 
        $msg = "Cadstrado com Sucesso!";
    
} else {
    // Caso a conexao nao seja realizada cria o retorno do cadastro com erro
    $msg = "Erro ao Cadastrar";
}
// Encerra a conexão com o banco
mysqli_close($con);
// Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
echo "<script>alert ('" . $msg . "'); location.href='index-coord.php';</script>"
    ?>