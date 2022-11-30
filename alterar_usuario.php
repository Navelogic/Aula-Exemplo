<html>

<head>
</head>

<body>
    <?php
    session_start();
    // Executa a conexao com o mysql e selecionar a base
    include_once 'conect.cfg';

    // pegar a identificação que esta vindo da página de consulta
    $id_user = $_POST["id_user"];
    $nome = $_POST["nome"];
    // recebe o Email
    $email = $_POST["email"];
    // recebe a senha Digitada
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    // Cria uma senha utilizando a criptografia de HASH em Md5
    $senha = md5($senha);
    // recebe o perfil do usuario
    $perfil = $_POST["perfil"];

    if ($_SESSION["id_user"] != $id_user) {

        // montar a instrução que ira ao banco excluir o registro
        $sql = "UPDATE users SET nome='$nome', email='$email', cpf='$cpf', senha='$senha', perfil='$perfil' where id_user =".$id_user;
      
        //Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
        if (mysqli_query($con, $sql)) {
            // Caso a conexao esteja correta cria o retorno da exclusao
            $msg = "Alterado com sucesso!";
        } else {

            // Caso a conexao nao seja realizada cria o retorno da exclusao com erro
            $msg = "Erro ao Alterar!";
        }

        mysqli_close($con);
        // Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
        echo "<script>alert('" . $msg . "'); location.href='index-coord.php';</script>";
    } else {
        echo "<script>alert ('Voce nao pode se Apagar!'); location.href='index-coord.php';</script>"; 
    }
    ?>
</body>

</html>