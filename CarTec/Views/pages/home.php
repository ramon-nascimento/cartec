<?php

use CarTec\Views\MainView;

MainView::renderHeader('Home | CarTec');
MainView::render('includes/navbar');
?>
<main class="card" style="margin-top: 2rem;"> 
  <header>
    <h4>Confira abaixo suas manutenções para a próxima semana</h4>
  </header>

  <span class='spinner'>
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  <span>
</main>

<script src="./CarTec/Views/js/api.js"></script>
<?= MainView::renderFooter(); ?>