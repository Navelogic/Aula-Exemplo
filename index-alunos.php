<?php 
session_start();
 // Executa a conexao com o mysql e selecionar a base
 include_once 'conect.cfg';

if (!$_SESSION["id"]) {
echo "<script>alert ('Permissao Invalida no Arquivo!'); location.href='index.php';</script>"; 
}
?>

<html>
    <head>
    <title>Alunos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<!-- Funcao excluir pelo javascript -->
<script>
    // Passa o id do usuário para a exclusão através da função javascript excluir
    function excluir(id) {
        if (confirm('deseja realmente excluir este Usuário ?')) {
            location.href = 'excluir.php?id=' + id;
            // irá para a lógica de excluir Aluno
        } // fecha o if

    } // termina a função excluir
</script>
    <body>
    <!-- Inicio do formulario -->
    <center>
    <div >
        <a href="logout.php">Sair</a>
      <form action="cad_usuario.php" method="post">
        
        <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-address-card"></i>Cadastrar &nbsp;Usuario:</legend>                         
            <div class="form-group row">
           <div class="column">
                <div class="col-3">          
                     <label id="label_cpf" >Nome</label>
                     <input type="text" class="form-control " name='nome' >
                 </div>
                </div>
                <div class="column">      
                    <label id="label_cpf" >E-mail</label>
                    <input type="text" class="form-control "  name='email' >                     
                  </div>
                  
                  <div class="column">      
                    <label id="label_cpf" >Senha</label>
                    <input type="text" class="form-control "  name='senha' >                     
                  </div>

                  <div class="column">      
                    <label id="label_cpf" >CPF</label>
                    <input type="text" class="form-control "  name='cpf' >                     
                  </div>

                  <div class="column"> 
                    <label id="label_cpf" >Perfil</label>
                  <select name="perfil" class="form-control ">
                    <option value="0" selected="selected">Aluno</option> 
                    <option value="1">Professor</option>
                    <option value="2">Coordenador</option>
                    </select>
                    </div>
                  
                 </div>
              
             </div> 
            </fieldset>
        
<button Type="submit">CADASTRAR</button>

      </form>
    </div>
    </div>
<?php
    $sql = "select * from  alunos";

//Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
$resultado = mysqli_query($con, $sql);

// Verifica Se existe algum registro
if (mysqli_num_rows($resultado) > 0) {

?>
    <br><br>
    <table>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Perfil</th>

        </tr>
        <?php
        // Enquanto encontrar uma linha no banco recarrega o conteúdo.
        while ($row = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?php echo $row["nome"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <?php
                // Verifica o perfil do usuario 0 Aluno, 1 Professor e 2 Coordenador e sera passado para variavel $p o valor correspondente
                switch ($row["perfil"]) {
                    case 2:
                        $p = "Coordenador";
                        break;
                    case 1:
                        $p = "Professor";
                        break;
                    case 0:
                        $p = "Aluno";
                        break;
                }
                ?>

                <td><?php echo $p; ?></td>
                <td>
                <td>
                    <!-- Passa o id do usuário para a função javascript excluir-->
                    <a href="#" " onclick="excluir(<?php echo $row["id"]; ?>)">
                        <button style="background-color: red;" >Excluir</button></a>

                        <a href="#" onclick="alterar(<?php echo $row["id"]; ?>)">
                        <button >Alterar</button></a>
                </td>
            </tr>
        <?php
        }
        
        ?>
    </table>
    <?php
            } 
    ?>
    </body>

    </html>
    