    <?php
    session_start();
    // Executa a conexao com o mysql e selecionar a base
    include_once 'conect.cfg';

    // pegar a identificação que esta vindo da página de consulta
    $id= $_GET['id'];

    $id_user = $_GET["id_user"];

    // Senha padrão do reset
    $senha = md5('123456');

           // montar a instrução que ira ao banco resetar a senha
           if($id==0){
            $sql = "UPDATE users SET  senha='$senha' where id_user =".$id_user;
            
           } 
           elseif($id==1){
            $sql = "UPDATE alunos SET  senha='$senha' where id_aluno =".$id_user;
           }
                  
        //Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
        if (mysqli_query($con, $sql)) {
            // Caso a conexao esteja correta cria o retorno da exclusao
            $msg = "Resetado com sucesso!";
        } else {

            // Caso a conexao nao seja realizada cria o retorno da exclusao com erro
            $msg = "Erro ao Resetar!";
        }

        mysqli_close($con);
        // Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
        echo "<script>alert('" . $msg . "'); location.href='index-coord.php';</script>";
    
    ?>