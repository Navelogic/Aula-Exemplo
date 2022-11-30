<?php

// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

//Recupera os dados enviados via POST
// recebe o Nome

$id_aluno = $_POST["id_aluno"];
$id_disciplina = $_POST["id_disciplina"];
$periodo = $_POST["periodo"];
$nota = $_POST["nota"];
//montar a query sql de gravação recebendo as variaveis via post
$sql = "insert into disciplinas values (null,'$id_aluno','$id_disciplina','$nota')";

//Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
if (mysqli_query($con, $sql)){
    // Caso a conexao esteja correta cria o retorno do cadastro
    $msg = "Cadastrado com sucesso!";
}else{    
    // Caso a conexao nao seja realizada cria o retorno do cadastro com erro
    $msg = "Erro ao Cadastrar";
}
// Encerra a conexão com o banco
mysqli_close($con);
// Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
echo "<script>alert ('".$msg."'); location.href='index-coord.php';</script>"
        

?>