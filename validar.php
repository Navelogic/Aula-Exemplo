    <?php
    // Executa a conexao com o mysql e selecionar a base
    include_once 'conect.cfg';
    
    session_start(); //faz o arquivo iniciar a sessao com o browser

    // pega dados via POST
    // Recebe o valo do email
    $email = $_POST["email"];
    // Recebe o valo do email
    $senha = $_POST["senha"];
    // Converte a senha em um hash criptografado de MD5
    $senha = md5($senha);

    //montar a instrução para ir ao banco
    //e selecionar o usuario que tenha este email
    $sql_usuarios = "select * from usuarios where email = '$email' AND senha = '$senha' ";

    $sql_alunos = "select * from alunos where email = '$email' AND senha = '$senha' ";

    //executar conexao e roda a query sql
    $res_usuarios = mysqli_query($con, $sql_usuarios);

    $res_alunos = mysqli_query($con, $sql_alunos);

    if (mysqli_num_rows($res_usuarios) == 1) {
    // Variavel $row recebe o conteudo do array gerado pelo banco
$row = mysqli_fetch_array($res_usuarios);
        
        $_SESSION["id"] = $row["id"];
        $_SESSION["nome"] = $row["nome"];
        $_SESSION["email"] = $row["email"];    
        $_SESSION["cpf"] = $row["cpf"];      
        $_SESSION["perfil"] = $row["perfil"];
       
        //econtrou
        //vou redirecionar o usuario para a pasta do sistema
        if ($row["perfil"] == "2") {
            header('Location: index-coord.php');
        }
        // Verifica a seção de acordo com o perfíl
        if ($row["perfil"] == "1") {
            header('Location: index-prof.php');
        }
    } 
    
    if (mysqli_num_rows($res_alunos) == 1) {
        // Variavel $row recebe o conteudo do array gerado pelo banco
        $row = mysqli_fetch_array($res_alunos);
        
                session_start(); //faz o arquivo iniciar a sessao com o browser
                $_SESSION["id_aluno"] = $row["id_aluno"];
                $_SESSION["nome"] = $row["nome"];
                $_SESSION["email"] = $row["email"];                
                $_SESSION["cpf"] = $row["cpf"];      
               
                //econtrou
                //vou redirecionar o usuario para a pasta do sistema
                header('Location: index-aluno.php');
        
            }    
    
    else {
        // Cria um alerta informando que o usuário ou senha é inválido
        echo "<script>alert ('Email ou Senha Invalidos!'); location.href='index.php';</script>";
    }


    ?>
