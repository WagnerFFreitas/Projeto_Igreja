<?php
	session_start(); 
	//Verifico se existe sessão, se não existir redireciono para pagina de login
	if(empty($_SESSION['login'])){
		$_SESSION['erro'] = 'Faça Login';
		header('Location:../index.php');
	}
  include('../includes/connectionfactory.php');
  
  
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>SICAM 1.0</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Style Personalizado-->
    <link rel="stylesheet" href="../css/style.css">

    <script>
      function excluirUser(id){
        $.ajax({
          type      : 'get',
          url       : '../controller/index.php?action=excluir&id='+id,

          //data      : 'id=' + id,

          //success : function(data){ 
          //alert();
          //  }
          success : function(){
            window.location='index.php';
          }

        });      
      }
    </script>
  </head>
  <body>
  
	  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="index.php">
           <img src="../img/logo.png" alt="Iep" class="img-logo-navbar">
          </a>
      </div><!--navbar-header-->

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="cadastrar.php">Cadastrar</a></li>
          <li><a href="../controller/logoff.php">Sair</a></li>
        </ul>
        
        <form class="navbar-form navbar-right" role="search" action="pesquisar.php" method="post">
          <div class="form-group">
            <input type="text" name="nome_pesquisa" class="form-control" placeholder="Pesquisar" autofocus required pattern="[a-z\s]+$">
          </div>
          <button type="submit" class="btn btn-default">Pesquisar</button>
        </form>
      </div><!-- /.navbar-collapse -->
    </nav><!--navbar-->  
  
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <?php 
            if(!empty($_SESSION['msg']['success'])){
          ?>
          <div class="alert alert-success" role="alert"><center><?=$_SESSION['msg']['success']?></center></div>
          <?php
            unset($_SESSION['msg']['success']);
            }else if(!empty($_SESSION['msg']['error'])){
              ?>
              <div class="alert alert-danger" role="alert"><center><?=$_SESSION['msg']['error']?></center></div>
              <?php
                unset($_SESSION['msg']['error']);
            }

           ?>
      </div><!--col-md-4 col-md-offset-4-->
    </div><!--row-msg-->
      <div id="list" class="row">
        <div class="table-responsive col-md-12">
          <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Celular</th>
                <th class="actions">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $PDO = connection();
                $sql = "SELECT *FROM user_membro WHERE nome LIKE :nome_pesquisa";
                $statement = $PDO->prepare($sql);
                $statement->bindValue(":nome_pesquisa",'%'.$_POST['nome_pesquisa'].'%');

                if($statement->execute()){
                  if($statement->rowCount() > 0){
                    while($membros = $statement->fetch(pdo::FETCH_ASSOC)){?>
                  <tr>
                    <td><?=$membros['nome']?></td>
                    <td><?=$membros['cpf']?></td>
                    <td><?=$membros['telefone']?></td>
                    <td class="actions">
                      <a class="btn btn-success btn-xs" href="../controller/index.php?action=imprimir&id=<?=$membros->id?>" target="_blank">Imprimir</a>
                      <a class="btn btn-warning btn-xs" href="editar.php?id=<?=$membros['id']?>">Editar</a>
                      <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal<?php echo $membros['id']?>">Excluir</a>
                        <!--Modal de exclusão-->
                        <div class="modal fade" id="delete-modal<?php echo $membros['id']?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="modalLabel">Excluir Membro</h4>
                                  </div>
                                  <div class="modal-body">Deseja realmente excluir este Membro? </div>
                                  <div class="modal-footer">
                                      <button onclick="excluirUser(<?php echo $membros['id']?>)" type="button" class="btn btn-primary">Sim</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <!--Fim do modal-->
                    </td>
                  </tr>
                  <?php
                    }
                  }else{
                    echo "<div class='alert alert-danger col-md-4 col-md-offset-4'><center>Não Há Membro Cadastrado Com Este Nome</center></div>";
                  }
                }else{
                  echo "<div class='alert alert-danger col-md-4 col-md-offset-4'><center>Erro ao Efetuar Consulta no Banco de Dados</center></div>";
                }
               ?>
            </tbody>
          </table>
        </div>
      </div><!--row-list-->
    </div><!--container-fluid-->
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>