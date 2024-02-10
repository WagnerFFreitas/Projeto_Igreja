<!--Inclusão do header-->
<?php
  include 'includes/header.php';
?>
    <!--INICIO CARROUSEL DE IMAGENS-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div id="carousel" class="carousel slide">
            <ol class="carousel-indicators">
              <li data-target="#carousel" data-slide-to="0" class="active"></li>
              <li data-target="#carousel" data-slide-to="1"></li>
              <li data-target="#carousel" data-slide-to="2"></li>
              <li data-target="#carousel" data-slide-to="3"></li>
              <li data-target="#carousel" data-slide-to="4"></li>
              <li data-target="#carousel" data-slide-to="5"></li>
              <li data-target="#carousel" data-slide-to="6"></li>
            </ol><!--carousel indicators-->

            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="img/carousel/nossa-programacao-2017.png" alt="Nossa Programação Igreja Evangelica Pentecostal Ouro Verde de Minas">
              </div>

              <div class="item">
                <img src="img/carousel/agenda-2017-carrousel.jpg" alt="Agenda da Igreja Evangelica Pentecostal de Ouro Verde de Minas">
              </div>              
              
              <div class="item">
                <img src="img/carousel/quintas-feiras-2017.jpg" alt="Culto Quintas-Feiras">
              </div>

              <div class="item">
                <img src="img/carousel/sabados-2017.jpg" alt="Culto Sabados">
              </div>

              <div class="item">
                <img src="img/carousel/domingos.jpg" alt="Escola Biblica e Culto aos Domingos">
              </div>

              <div class="item">
                <img src="img/carousel/dizimista-fiel.jpg" alt="Campanha Dizimista Fiel">
              </div>

              <div class="item">
                <img src="img/carousel/orar-e-clamar.jpg" alt="Campanha Orar e Clamar">
              </div>

            </div><!--carousel inner-->

            <a href="#carousel" class="left carousel-control" data-slide="prev">
              <i class="glyphicon glyphicon-chevron-left"></i>
            </a>

            <a href="#carousel" class="right carousel-control" data-slide="next">
              <i class="glyphicon glyphicon-chevron-right"></i>
            </a>
          </div><!--carousel slide-->
        </div><!--col-md-10-->
      </div><!--row-->
    </div><!--FIM container-fluid-->
    <!--FIM CARROUSEL DE IMAGENS-->
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <center><h4>Nosso Canal no Youtube</h4></center>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">    
          <div class="col-md-4">
            <center><p>1º Aniversário da IEP Ouro Verde/MG Parte I</p></center>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ne8sMwrESOc" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          
          <div class="col-md-4">
            <center><p>1° Aniversário da IEP Ouro Verde/MG Part II</p></center>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/oflyuZKco6A" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-md-4">
            <center><p>2º Culto de Missões da IEP Ouro Verde/MG</p></center>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/jGzSZLOzclc" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div><!--FIM row-->
    </div><!--FIM container-fluid-->

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <center><h4>Grupos da IEP Ouro Verde de Minas</h4></center>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-md-4">
            <img class="img-responsive thumbnail" src="img/grupos/grupo-chama-de-louvor.jpg" alt="Grupo Chama de Louvor">
            <center><h4>Chama de Louvor</h4></center>
          </div>

          <div class="col-md-4">
            <img class="img-responsive thumbnail" src="img/grupos/grupo-adoradores-por-excelencia.jpg" alt="Adoradores por Excelência">
            <center><h4>Adoradores por Excelência</h4></center>
          </div>

          <div class="col-md-4">
            <img class="img-responsive thumbnail" src="img/grupos/grupo-lirio-dos-vales.jpg" alt="Grupo Lírio dos Vales">
            <center><h4>Lírio dos Vales</h4></center>
          </div>
        </div>
      </div>
    </div><!--FIM container-fluid-->
    
    <!--Inclusão do rodapé-->
    <?php
      include 'includes/footer.php';
    ?>