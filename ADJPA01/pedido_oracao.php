<!--Start Session Msg-->
<?php
  session_start();
?>
<!--Inclusão do header-->
<?php
  include 'includes/header.php';
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <img src="img/pedido_oracao_2017.jpg" class="img-responsive" alt="Pedido de Oração" height="200" width="100%">
      </div>
    </div>
    
    <div class="row" style="margin-top:2%;">
      <div class="col-md-4 col-md-offset-4">
        <?php
          if(!empty($_SESSION['msg']['success'])){
        ?>
        <div class="alert alert-success" role="alert">
          <center><?=$_SESSION['msg']['success']?></center>
        </div>
        <?php
          unset($_SESSION['msg']['success']);
          }else if(!empty($_SESSION['msg']['error'])){
        ?>
          <div class="alert alert-danger" role="alert">
            <center><?=$_SESSION['msg']['error']?></center>
          </div>
        <?php
          unset($_SESSION['msg']['error']);
          }//fechamento do else if
        ?>
      </div><!--col-md-4 col-md-offset-4-->
    </div><!--row-msg-->

    <div class="row" style="margin-top:5%;">
      <div class="col-md-10 col-md-offset-1">
        <fieldset>
          <legend><center>Faça Seu Pedido De Oração</center></legend>

          <form action="mail.php" method="post" data-toggle="validator">
            <div class="row">
              <div class="col-md-4 col-md-offset-2 form-group has-feedback">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" autofocus required data-error="Preencha este campo">
                <span class="glyphicon form-control-feedback"></span>
                <small class="help-block with-errors">Por favor seu nome completo</small>
              </div>

              <div class="col-md-4 form-group has-feedback">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required data-error="Preencha este campo">
                <span class="glyphicon form-control-feedback"></span>
                <small class="help-block with-errors">Por favor seu melhor e-mail</small>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 col-md-offset-2 form-group has-feedback">
                <label for="estado">Estado: </label>
                <select id="estado" name="estado" class="form-control" required data-error="Selecione um estado"></select>
                <span class="glyphicon form-control-feedback"></span>
                <small class="help-block with-errors">Por favor selecione o estado onde você mora</small>
              </div>

              <div class="col-md-4 form-group has-feedback">
                <label for="cidade">Cidade: </label>
                <select id="cidade" name="cidade" class="form-control" required data-error="Selecione uma cidade"></select>
                 <span class="glyphicon form-control-feedback"></span>
                <small class="help-block with-errors">Por favor selecione a cidade onde você mora</small>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 col-md-offset-2 form-group has-feedback">
                <label for="pedido">Pedido: </label>
                <textarea name="pedido" class="form-control" id="pedido" cols="30" rows="10" required data-error="Digite o seu pedido de oração"></textarea>
                 <span class="glyphicon form-control-feedback"></span>
                 <small class="help-block with-errors">Por favor digite seu pedido de oração</small>
              </div>
            </div>

            <div class="row" style="margin-bottom:1%;">
              <div class="col-md-2 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
<!--Inclusão do footer-->
<?php
  include 'includes/footer.php';
?>