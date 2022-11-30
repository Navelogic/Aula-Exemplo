<?php
session_start();
// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

if ($_SESSION["perfil"] != 1) {
  echo "<script>alert ('Permissao Invalida no Arquivo!'); location.href='index.php';</script>";
}
?>

<html>

<head>
  <title>Professor</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Adicionando Javascript -->
  <script src="js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="css/w3.css">
</head>

<body>
  <!-- Inicio do formulario -->
  <center>
    <div>
      <a href="logout.php">Sair</a>

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
        <th>Notas</th>
        <th>Discplinas</th>
        <th>Notas</th>

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


        <td>
          <button onclick="document.getElementById('<?php echo $row['id_aluno']; ?>').style.display='block'"
            class="w3-button w3-black">Inserir Nota</button>

            <button onclick="document.getElementById('nota<?= $row['id_aluno']; ?>').style.display='block'" class="w3-button w3-black">Open Modal</button>

        </td>
      </tr>

      
    </table>
<?php
}
?>
<!-- Criação da chamada do modal baseado no css do W3-->
<div id="<?php echo $row['id_aluno']; ?>" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container">
            <span onclick="document.getElementById('<?php echo $row['id_aluno']; ?>').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
            <form action="cad-nota.php" method="post">
              <p>
                <?php echo $row['nome']; ?>
              </p>
              <p>

                <?php
    $sql_disc = "select * from  disciplinas";
    $res_disc = mysqli_query($con, $sql_disc);
    if (mysqli_num_rows($res_disc) > 0) {
        ?>
              <div class="column">
                <label id="label_cpf">Disciplina</label>
                <select name="perfil" class="form-control ">
                  <?php // Enquanto encontrar uma linha no banco recarrega o conteúdo.
      while ($row_disc = mysqli_fetch_array($res_disc)) {

                    ?>
                  <option value="<?php echo $row_disc['id_disciplina']; ?>">
                    <?php echo $row_disc['disciplina']; ?>
                  </option>

                  <?php
      }
    }
                    ?>

                </select>
              </div>

              </p>
              <p>
              <div class="column">
                <label id="label_cpf">Nota</label>
                <input type="text" class="form-control " name='nota'>
              </div>
              </p>
              <p>
                <button type="submit">Lançar</button>
              </p>
            </form>
          </div>
        </div>
      </div>
      </div>

      <?php
  }

        ?>


<!-- Criação da chamada do modal baseado no css do W3-->
<div id="nota<?= $row['id_aluno']; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('nota<?= $row['id_aluno']; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <p>Some text..</p>
        <p>Some text..</p>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
</div>    

</body>

</html>