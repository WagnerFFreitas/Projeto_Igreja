<?php
  session_start(); 
  //Verifico se existe sessão, se não existir redireciono para pagina de login
  if(empty($_SESSION['login'])){
    $_SESSION['erro'] = 'Faça Login';
    header('Location:../index.php');
  }
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
    
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  

    <!-- jQuery (obrigatório para plugins JavaScript do DataPicker) -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Style Personalizado-->
    <link rel="stylesheet" href="../css/style.css">
    <!--Script Combobox Cidade e Estados-->
    <script type="text/javascript">
      window.onload = function() {
          new dgCidadesEstados( 
              document.getElementById('estado'), 
              document.getElementById('cidade'), 
              true
          );
      }
    </script>

    <script>
      $(function() {
        $(".date_picker").datepicker({
          dateFormat:'dd/mm/yy',
          changeMonth: true,
          changeYear: true,
          ayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
          dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
          dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
          monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
          monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        });
      });
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
        <div class="col-md-11 col-md-offset-1">
        <fieldset>
          <legend>Cadastro de Membro</legend>
            <form action="../controller/index.php?action=cadastrar" method="post" enctype="multipart/form-data">
              <div class="row">                
                <div class="col-md-4">
                  <label for="nome">Nome:</label>
                  <input name="nome" type="text" class="form-control" placeholder="Nome" autofocus required>
                </div><!--col-md-4-->

                <div class="col-md-2">
                  <label for="rg">Rg:</label>
                  <input name="rg" type="text" class="form-control" placeholder="Rg" required>
                </div><!--col-md-4-->

                <div class="col-md-2">
                  <label for="cpf">Cpf:</label>
                  <input class="form-control" type="text" name="cpf" id="cpf" onblur="javascript: validarCPF(this);" onkeypress="javascript: mascara(this, cpf_mask);" maxlength="14" required/>
                </div><!--col-md-4-->
              
              </div><!--row-->
              
              <div class="row">
                <div class="col-md-4">
                  <label for="nomePai">Pai:</label>
                  <input name="nomePai" type="text" class="form-control" placeholder="Pai" required>
                </div>

                <div class="col-md-4">
                  <label for="nomeMae">Mãe:</label>
                  <input name="nomeMae" type="text" class="form-control" placeholder="Mãe" required>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-md-2">
                  <label for="naturalidade">Naturalidade:</label>
                  <input name="naturalidade" type="text" class="form-control" placeholder="Naturalidade" required>
                </div>

                <div class="col-md-4">
                  <label for="endereco">Endereço:</label>
                  <input type="text" name="endereco" class="form-control" placeholder="Endereço" required>
                </div>

                <div class="col-md-1">
                  <label for="numero">N°</label>
                  <input type="number" min="1" name="numero" class="form-control" placeholder="N°" required>
                </div>

                <div class="col-md-1">
                  <label for="bairro">Bairro:</label>
                  <input type="text" name="bairro" class="form-control" placeholder="Bairro" required>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-md-2">
                  <label for="estado">Estado:</label>
                  <select id="estado" name="estado" class="form-control" required></select> 
                </div>

                <div class="col-md-2">
                  <label for="cidade">Cidade:</label>
                  <select id="cidade" name="cidade" class="form-control" required></select> 
                </div>

                <div class="col-md-2">
                  <label for="telefone">Telefone:</label>
                  <input type="tel" pattern=".{13,13}" name="telefone" class="form-control" placeholder="Telefone" required onkeyup="criaMascara(this, '(##)####-####');">
                </div>

                <div class="col-md-2">
                  <label for="celular">Celular:</label>
                  <input type="tel" pattern=".{14,14}" name="celular" class="form-control" placeholder="Celular" required onkeyup="criaMascara(this, '(##)#####-####');">
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-md-2">
                  <label for="dataNascimento">Data Nascimento:</label>
                  <input type="text" class="form-control date_picker" placeholder="Data Nascimento" name="dataNascimento" required onkeyup="criaMascara(this, '##/##/####');">
                </div>

                <div class="col-md-2">
                  <label for="estadoCivil">Estado Civil:</label> 
                    <select class="form-control" name="estadoCivil" required>
                      <option value="solteiro">Solteiro(a)</option>
                      <option value="casado">Casado(a)</option>
                      <option value="divorciado">Divorciado(a)</option>
                      <option value="viuvo">Viuvo(a)</option>
                    </select>
                </div>

                <div class="col-md-2">
                  <label for="profissao">Profissão:</label>
                  <input type="text" class="form-control" placeholder="Profissão" name="profissao" required>
                </div>

                <div class="col-md-2">
                  <label for="dataConversao">Data Conversão:</label>
                  <input type="text" class="form-control date_picker" placeholder="Data Conversao" name="dataConversao" onkeyup="criaMascara(this, '##/##/####');">
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-md-2">
                  <label for="dataBatismo">Data Batismo:</label>
                  <input type="text" class="form-control date_picker" required placeholder="Data Batismo" name="dataBatismo" onkeyup="criaMascara(this, '##/##/####');">
                </div>

                <div class="col-md-4">
                  <label for="igrejaAnterior">Igreja Anterior:</label>
                  <input type="text" class="form-control" placeholder="Igreja Anterior" name="nomeIgrejaAnterior">
                </div>

                <div class="col-md-2">
                  <label for="telefoneIgrejaAnterior">Telefone:</label>
                  <input type="text" pattern=".{13,13}" class="form-control" placeholder="Telefone" onkeyup="criaMascara(this, '(##)####-####');" name="telefoneIgrejaAnterior">
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-md-4 form-group">
                  <label for="observacoes">Observações:</label>
                  <textarea name="observacoes" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>

                <div class="col-md-2">
                <label for="file">Foto 3x4:</label>
                 <input type = "file" name = "imagem_upload" accept="image/*" class = "filestyle" data-buttonText = "Apenas jpg,png e gif." required>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary form-control">Salvar</button>
                </div>
              </div><!--row-->
            </form><!--form-->
          </fieldset>
        </div><!--col-md-12-->
    </div><!--row-->
    <nav class="navbar-fixed-bottom navbar-inverse">
      <div class="row">
        <div class="col-md-3 col-md-offset-5 col-xs-offset-1">
          <footer>Sicam 1.0 Desenvolvido por Augusto Ramos</footer>
        </div>
      </div>
    </nav>
  </div><!--container-fluid-->
    
    
    
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-filestyle.min.js"> </script>
    <!-- Script para Validar CPF -->
    <script type="text/javascript" src="../js/validar-cpf.js"></script>
    <!-- Script para Criar Mascara para Telefone e Celular-->
    <script type="text/javascript" src="../js/cria-mascara.js"></script>
    <!-- Script Combobox Cidade e Estados -->
    <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script> 
  </body>
</html>