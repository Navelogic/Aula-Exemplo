<?php
session_start();
// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

if ($_SESSION["perfil"] != '2') {
    echo "<script>alert ('Permissao Invalida no Arquivo!'); location.href='index.php';</script>";
}
?>

<html>

<head>
    <title>Coordenador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando Javascript -->
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- Funcao excluir pelo javascript -->
<script>
    // Passa o id do usuário para a exclusão através da função javascript excluir
    function excluir_usuario(id_user) {
        if (confirm('deseja realmente excluir este Usuário ?')) {
            location.href = 'excluir_usuario.php?id_user=' + id_user;
            // irá para a lógica de excluir Aluno
        } // fecha o if

    } // termina a função excluir

    function excluir_aluno(id_aluno) {
        if (confirm('deseja realmente excluir este Aluno ?')) {
            location.href = 'excluir_aluno.php?id_aluno=' + id_aluno;
            // irá para a lógica de excluir Aluno
        } // fecha o if

    } // termina a função excluir

    function cad_endereco(id_aluno) {
        location.href = 'form_cad_endereco.php?id_aluno=' + id_aluno;
    } // termina a função excluir

    function alt_usuario(id_user) {
        location.href = 'form_alt_usuario.php?id_user=' + id_user;
    } // termina a função excluir
    function reset_senha(id_user,id) {
        location.href = "reset_senha.php?id_user="+id_user+"&id="+id;
    } // termina a função excluir

    
</script>

<body>

    <!-- Inicio do formulario -->
    <center>
        <div>
            <a href="logout.php">Sair</a>

            <form action="cad-dic.php" method="post">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-address-card"></i>Cadastrar &nbsp;Disciplina:</legend>
                    <div class="form-group row">
                        <div class="column">
                            <div class="col-3">
                                <label id="label_cpf">Nome da Disciplina</label>
                                <input type="text" class="form-control " name='disciplina'>
                            </div>
                        </div>
                        <?php
                        $sql_dic = "select * from  disciplinas";

                        //Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
                        $res_dic = mysqli_query($con, $sql_dic);

                        // Verifica Se existe algum registro
                        if (mysqli_num_rows($res_dic) > 0) {

                        ?>
                        <div class="column">
                            <label id="label_cpf">Disciplina</label>
                            <select name="perfil" class="form-control ">
                                <?php // Enquanto encontrar uma linha no banco recarrega o conteúdo.
                            while ($row_dic = mysqli_fetch_array($res_dic)) {

                        ?>
                                <option value="1">
                                    <?php echo $row_dic['disciplina']; ?>
                                </option>

                                <?php
                            }
                        }
                        ?>

                            </select>
                        </div>

                    </div>
                </fieldset>

                <button Type="submit">CADASTRAR DISCIPLINA</button>

            </form>


            <form action="cad_usuario.php" method="post">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-address-card"></i>Cadastrar &nbsp;Usuário:</legend>
                    <div class="form-group row">
                        <div class="column">
                            <div class="col-3">
                                <label id="label_cpf">Nome</label>
                                <input type="text" class="form-control " name='nome'>
                            </div>
                        </div>
                        <div class="column">
                            <label id="label_cpf">E-mail</label>
                            <input type="text" class="form-control " name='email'>
                        </div>

                        <div class="column">
                            <label id="label_cpf">Senha</label>
                            <input type="text" class="form-control " name='senha'>
                        </div>

                        <div class="column">
                            <label id="label_cpf">CPF</label>
                            <input type="text" class="form-control " name='cpf'>
                        </div>

                        <div class="column">
                            <label id="label_cpf">Perfil</label>
                            <select name="perfil" class="form-control ">
                                <option value="1">Professor</option>
                                <option value="2">Coordenador</option>
                            </select>
                        </div>

                    </div>

        </div>
        </fieldset>

        <button Type="submit">CADASTRAR USUÁRIOS</button>

        </form>
        </div>
        </div>

        <form action="cad_aluno.php" method="post">

            <fieldset class="mt-4 border p-2">
                <legend class="font-small"><i class="fas fa-address-card"></i>Cadastrar &nbsp;Alunos:</legend>
                <div class="form-group row">
                    <div class="column">
                        <div class="col-3">
                            <label id="label_cpf">Nome</label>
                            <input type="text" class="form-control " name='nome'>
                        </div>
                    </div>
                    <div class="column">
                        <label id="label_cpf">E-mail</label>
                        <input type="text" class="form-control " name='email'>
                    </div>

                    <div class="column">
                        <label id="label_cpf">Senha</label>
                        <input type="text" class="form-control " name='senha'>
                    </div>

                    <div class="column">
                        <label id="label_cpf">CPF</label>
                        <input type="text" class="form-control " name='cpf'>
                    </div>

                </div>

                </div>
            </fieldset>

            <button Type="submit">CADASTRAR ALUNOS</button>

        </form>
        </div>
        </div>

        <!-- Exibicao dos Usuarios -->
        <?php
        $sql = "select * from  users";

        //Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
        $resultado = mysqli_query($con, $sql);

        // Verifica Se existe algum registro
        if (mysqli_num_rows($resultado) > 0) {

        ?>
        <br><br>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Ações</th>
            </tr>
            <?php
            // Enquanto encontrar uma linha no banco recarrega o conteúdo.
            while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td>
                    <?php echo $row["nome"]; ?>
                </td>
                <td>
                    <?php echo $row["email"]; ?>
                </td>
                <?php
                /* Verifica o perfil do usuario 0 Aluno, 1 Professor e 2 Coordenador e sera passado para variavel $p o valor correspondente
                Foi resolvido com a linha abaixo
                switch ($row["perfil"]) {
                case 2:
                $p = "Coordenador";
                break;
                case 1:
                $p = "Professor";
                break;                    
                }*/
                ?>
                <!-- echo com if condição operador ? RespostaVerdadeira:RespostaFalsa -->
                <td>
                    <?php echo $row["perfil"] == 2 ? 'Cordenador' : 'Professor'; ?>
                </td>

                <td>
                    <!-- Passa o id do usuário para a função javascript excluir-->
                    <a href="#" onclick="excluir_usuario(<?php echo $row["id_user"]; ?>)">
                        <button style="background-color: red;">Excluir</button></a>

                    <a href="#" onclick="alt_usuario(<?php echo $row["id_user"]; ?>)">
                        <button>Alterar</button></a>

                        <a href="#" onclick="reset_senha(<?php echo $row["id_user"]; ?>,0)">
                        <button style="background-color: grey;">Reset de Senha</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
            <?php
        }
            ?>
            <!-- Final da exibicao dos usuarios-->

            <!-- Inicio Exibicao dos Alunos -->
            <?php
            $sql_alunos = "select * from  alunos";           

            //Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
            $res_alunos = mysqli_query($con, $sql_alunos);

            // Verifica Se existe algum registro
            if (mysqli_num_rows($res_alunos) > 0) {

            ?>
            <?php
                // Enquanto encontrar uma linha no banco recarrega o conteúdo.
                while ($row_alunos = mysqli_fetch_array($res_alunos)) {

                    $sql_endereco = "select * from  enderecos where id_aluno=".$row_alunos['id_aluno'];
                    $res_enderecos = mysqli_query($con, $sql_endereco);
                    
// Irá fazer a verificação se o aluno tem um endereço, caso não tenha irá aparecer o campo vazio
                    if (mysqli_num_rows($res_enderecos) > 0) {
                    $row_endereco = mysqli_fetch_array($res_enderecos);

                    $endereco = 'CEP: '.$row_endereco['cep'].', '. $row_endereco['rua'].', '.$row_endereco['numero'].', ' .$row_endereco['complemento'] .', '.$row_endereco['bairro'].' ,' .$row_endereco['cidade'].', ' .$row_endereco['uf'].', COD. IBGE: '.$row_endereco['ibge'];
                    } else {
                        $endereco = ' Sem Endereço Cadastrado!';
                    }

            ?>
            <tr title="<?= $endereco ?>">
                <td>
                    <?php echo $row_alunos["nome"]; ?>
                </td>
                <td>
                    <?php echo $row_alunos["email"]; ?>
                </td>

                <td>Aluno</td>
                <td>
                    <!-- Passa o id do usuário para a função javascript excluir-->
                    <a href="#" onclick="excluir_aluno(<?php echo $row_alunos["id_aluno"]; ?>)">
                        <button style="background-color: red;">Excluir</button></a>

                    <a href="#" onclick="alterar_aluno(<?php echo $row_alunos["id_aluno"]; ?>)">
                        <button >Alterar</button></a>
                    <a href="#" onclick="cad_endereco(<?= $row_alunos["id_aluno"]; ?>)">
                        <button style="background-color: grey;">Cadastrar Endereço</button></a>

                        <a href="#" onclick="reset_senha(<?= $row_alunos["id_aluno"]; ?>,1)">
                        <button style="background-color: grey;">Reset de Senha</button></a>
                </td>
            </tr>
            <?php
                }

            ?>
        </table>
        <?php
            }
            ?>
        <!-- Final da exibicao dos Alunos -->
</body>

</html>