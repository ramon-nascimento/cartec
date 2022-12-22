<?php
use CarTec\Views\MainView;

MainView::renderHeader('Login | CarTec') 
?>

<main class="card" style="width: 280px;">
  <header>
    <h3 class="title">Login</h3>
    <p class="subtitle">Acesso ao CarTec</p>
  </header>

  <form class="form" method="post">
    <label class="form-control">
      <input type="text" placeholder="E-mail" name="email" autocomplete="off" required>

      <span class="input-icon">
        <i class="fa-solid fa-user"></i>
      </span>
    </label>

    <label class="form-control">
      <input type="password" placeholder="Senha" name="password" required>

      <span class="input-icon">
        <i class="fa-solid fa-lock"></i>
      </span>
    </label>

    <p>Não possuí cadastro? <a href="./singup">Cadastre-se!</a></p>

    <button type="submit" name="login" onclick="handleLoadingButton.show(this)">
      Acessar
    </button>    
  </form>  
</main>
<?= MainView::renderFooter(); ?>