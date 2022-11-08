<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center>
<div style="width:50vh;">
<h2>Login Form</h2>

<form action="validar.php" method="post">
  <div class="imgcontainer">
    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="Digite seu E-mail" name="email" required>

    <label for="senha"><b>Senha</b></label>
    <input type="password" placeholder="Digite sua Senha" name="senha" required>
        
    <button type="submit">Login</button>
   
  </div>

</form>
<a href="cad-aluno.html">Nao tem Login Cadastra-se!</a>
</div>
</body>
</html>
