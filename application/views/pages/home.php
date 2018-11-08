<main role="main">
  <!--Carousel Slide-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?=base_url('static/img/slide4.jpg')?>" alt="Primeira Imagem">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1 style="color:black;">Integração de Setores.</h1>
            <p style="color:black;">O intuito é de integrar os diversos setores do estabelecimento, tais como: recepção, consultório, farmácia e administração.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url('static/img/slide2.jpg')?>" alt="Segunda Imagem">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1 style="color:black;">Mais rapidez nos serviços.</h1>
            <p style="color:black;">Possibilidade de agendamento de consultas médicas e pesquisa de medicamentos.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</main>
