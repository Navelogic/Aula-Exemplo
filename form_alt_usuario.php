<?php
session_start();
include "conect.cfg";
$id_user = $_GET['id_user'];

$sql = "SELECT * FROM users WHERE id_user=".$id_user;
$resultado = mysqli_query($con, $sql);
if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    // Caso a conexao esteja correta cria o retorno da exclusao    
} else {

    echo "<script>alert ('ID não encontrado!!'); location.href='index-coord.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de Usuário</title>
</head>
<body>
    <form action="alterar_usuario.php" method="post">

        <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-address-card"></i>Cadastrar &nbsp;Usuário:</legend>
            <div class="form-group row">
                <div class="column">
                    <div class="col-3">
                        <label id="label_cpf">Nome</label>
                        <input type="text" class="form-control " name='nome' value="<?= $row['nome'] ?>">
                    </div>
                </div>
                <div class="column">
                    <label id="label_cpf">E-mail</label>
                    <input type="text" class="form-control " name='email' value="<?= $row['email'] ?>">
                </div>
             

                <div class="column">
                    <label id="label_cpf">CPF</label>
                    <input type="text" class="form-control " name='cpf' value="<?= $row['cpf'] ?>">
                </div>

                <div class="column">
                    <label id="label_cpf">Perfil</label>
                    <select name="perfil" class="form-control ">
                        <option value="1" >Professor</option>
                        <option value="2" <?php echo $row['perfil']==2?'selected':'' ?>>Coordenador</option>
                    </select>
                </div>

            </div>
<input value="<?= $id_user ?>" name="id_user" hidden>
</div>
<button type="submit">ATUALIZAR</button>

</form>
</fieldset>
<a href="index-coord.php"><button type="cancel">CANCELAR</button></a>
</body>
</html>