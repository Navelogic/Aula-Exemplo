<?php

// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

//Recupera os dados enviados via POST
// recebe o Nome
$nome = $_POST["nome"];
// recebe o Email
$email = $_POST["email"];
// recebe a senha Digitada
$cpf =$_POST["cpf"];
$senha = $_POST["senha"];
// Cria uma senha utilizando a criptografia de HASH em Md5
$senha = md5($senha);
// recebe o perfil do usuario
$perfil = $_POST["perfil"];


//montar a query sql de gravação recebendo as variaveis via post
$sql = "insert into alunos values (null,'$nome','$email','$senha','$cpf')";

//Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.

//Recupera o Ultimo ID inserido no Banco
    if (mysqli_query($con, $sql)) {
        $last_id = mysqli_insert_id($con);
        $id_aluno = $last_id;
        
       // Caso a conexao esteja correta cria o retorno do cadastro 
        $msg = "Cadastrado com sucesso!";
        // Cadastro do Ederedereco

        $sql_endereco = "insert into enderecos values (null,'$id_aluno','$cep','$rua','$numero','$complemento','$bairro','$cidade','$uf','$ibge')";

        mysqli_query($con, $sql_endereco);
    
} else {
    // Caso a conexao nao seja realizada cria o retorno do cadastro com erro
    $msg = "Erro ao Cadastrar";
}
// Encerra a conexão com o banco
mysqli_close($con);
// Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
echo "<script>alert ('" . $msg . "'); location.href='index.php';</script>";


    ?>