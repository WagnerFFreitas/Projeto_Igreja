<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Sistema Integrado de Cadastro de Membros IEPOV-1.0</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Style Personalizado-->
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
          <form class="form-signin" method = "post" action="controller/login.php">
          <img src="img/logo.png" alt="Igreja Evangelica Pentecostal" class="img-responsive img-circle">
          <?php 
            if(!empty($_SESSION['erro'])){?>
          <div class="alert alert-danger" role="alert"><?=$_SESSION['erro']?></div>
          <?php
            unset($_SESSION['erro']);
            }
           ?>
          <label for="inputEmail" class="sr-only">Email:</label>
          <input type="email" name="inputEmail" class="form-control" placeholder="Email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autofocus>
          <label for="inputPassword" class="sr-only">Senha:</label>
          <input type="password" name="inputPassword" class="form-control" placeholder="Senha" required="required">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="lembrar" value="remember-me"> Lembrar-me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
      </div> <!-- /row -->
    </div> <!-- /container -->
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>