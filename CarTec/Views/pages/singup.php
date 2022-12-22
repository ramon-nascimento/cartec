<?php
use CarTec\Views\MainView;

MainView::renderHeader('Cadastro | CarTec') 
?>

<main class="card" style="width: 280px;">
  <header>
    <h3 class="title">Cadastro</h3>
    <p class="subtitle">Cadastro ao CarTec</p>
  </header>

  <form class="form" method="post">
    <label class="form-control">
      <input type="text" placeholder="Nome completo" name="user" autocomplete="off" required>

      <span class="input-icon">
        <i class="fa-solid fa-user"></i>
      </span>
    </label>

    <label class="form-control">
      <input type="email" placeholder="E-mail" name="email" autocomplete="off" required>

      <span class="input-icon">
        <i class="fa-solid fa-envelope"></i>
      </span>
    </label>

    <label class="form-control">
      <input type="password" placeholder="Senha" name="password" required>

      <span class="input-icon">
        <i class="fa-solid fa-lock"></i>
      </span>
    </label>

    <label class="form-control">
      <input type="password" placeholder="Confirmação de senha" name="passwordConfirmation" required>

      <span class="input-icon">
        <i class="fa-solid fa-lock"></i>
      </span>
    </label>

    <p>Já está cadastrado? <a href="./login">Acesse!</a></p>

    <button type="submit" name="singup">
      Cadastrar
    </button>    
  </form>  
</main>
<?= MainView::renderFooter(); ?>