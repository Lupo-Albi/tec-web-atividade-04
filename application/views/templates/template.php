<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?= $title ?></title> <!-- Variável para definir o título da view. A variável é definida no controlador de cada view correspondente -->

    <!-- Principal CSS do Bootstrap -->
    <link href="<?=base_url('static/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="<?=base_url('static/css/starter-template.css')?>" rel="stylesheet">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Sistema Hospitalar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<?php 
				foreach($nav_list as $i => $nav_item): // Iteração para exibir os itens de navegação que estão listados em application/libraries/Template.php
				// $attributes - define quais os atributos classe para os itens da barra de navegação. Caso o item de navegação for o da view atual, ele estará destacado por meio to atributo active.
				$attributes = ($nav == $nav_item ? "class='nav-link active'" : "class='nav-link'") // $nav é definida no controlador da view correspondente
				?>
					<li class="nav-item">
						<?= anchor($nav_item, $nav_item, $attributes) ?> <!-- anchor($uri='', $title='',$attributes='') $uri(string) - URI string, $title(string) - Anchor title, $attributes(mixed) - HTML attributes -->
					</li>
				<?php endforeach ?>
			</ul>
        </div>
      </nav>
    </header>
	
	<!-- Estrutura do Most Simple Template para exibir o conteúdo da página.
	<--- $contents é onde as views serão inseridas dentro desse template
	<------------------------------------------------------------------------>
	<div id="contents">
		<?= $contents ?>
	</div>
	
	<!-- FOOTER -->
    <footer class="container">
		<p class="float-right"><a href="#">Back to top</a></p>
		<!--<p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
    </footer>
	
<!-- Principal JavaScript do Bootstrap
================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
	<script src="<?=base_url('static/js/jquery-3.3.1.slim.min.js')?>" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="<?=base_url('static/js/popper.min.js')?>"></script>
	<script src="<?=base_url('static/js/bootstrap.min.js')?>"></script>
  </body>
</html>