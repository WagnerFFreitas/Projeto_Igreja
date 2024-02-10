<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <!-- CSS DO MATERIALIZE-->
      
      <LINK rel="stylesheet" href="materialize/css/materialize.min.css">
        <title></title>
    </head>
    <body>
        <nav class="blue-grey">
            <div class="nav-wrapper container">
                <div class="brand-logo light">Sistema de Cadastro</div>  
                <ul class="right">
                    <li><a href=""><i class="material-icons left">account_circle</i>Cadastro</a></li>
                    <li><a href=""><i class="material-icons left">search</i>Consultas</a></li>
                    
                    
                </ul>
            </div>           
        </nav>
        
        <!--Formulario de cadastro-->
        <div class="row container">
            <p>&nbsp;</p>
            <form action="banco_de_dados/create.php" method="post" class="col s12"></form>
            <fieldset class="formulario">
                <legend><img src="imagem/cadastro-cliente.png" alt="(imagem)" width="100"></legend>
                <h5 class="light center">Cadastro de Clientes</h5>
<!--                Campo nome-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input class="small" type="text" name="nome" id="nome" required autofocus>
                    <label class="small" for="nome">Nome do Cliente</label>
                </div>
<!--                    campo email-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">email_circle</i>
                    <input type="email" name="email" id="email" maxlength="50" required>
                    <label for="email">Email do Cliente</label>
                </div>
                    <!--campo email-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone_circle</i>
                    <input type="tel" name="telefone" id="telefone" maxlength="50" required>
                    <label for="email">Telefone do Cliente</label>
                </div>
                        <!--campo nascimento-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">date_range</i>
                    <input type="date" name="nascimento" maxlength="20" required>
                    <label for="nascimento">Data de Nasacimento</label>
                </div>
                    <!--campo endereço-->
                <div class="input-field col s12">
                    <i class="material-icons prefix">home</i>
                    <input type="text" name="endereco" required>
                    <label for="endereco">Endereço</label>
                    <input type="number" name="number">
                </div>
                <div>
                   
                </div>
                <div>
                    <input type="submit" value="Cadastrar" class="btn blue">
                    <input type="reset" value="Limpar" class="btn red">     
                </div>    
                        
            </fieldset>
            
        </div>
        
    <!--Arquivos JQUERY e JS-->
    <script type="text/javascript" src="materialize/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        
                <!--Inicialização JQUERY-->
    <script type="text/javascript">
         $(document).ready(function(){              
    });
                            
    </script>

    </body>
</html>
