<?php 
  use CarTec\Utils;
  $url = explode('url', @$_GET['url'])[0]; 

  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    Utils::redirectTo('login');
  }
?>
<div class="navbar"> 
  <nav>
    <button class="menu-btn">
      <span></span>
    </button>

    <ul class="nav-items">
      <li class="nav-item <?= $url == 'home' || empty($url) ? 'selected' : '' ?>">
        <a href="./home">
          <i class="fa-solid fa-house"></i>
          Início
        </a>
      </li>
      <li class="nav-item <?= $url == 'cars' ? 'selected' : '' ?>">
        <a href="./cars">
          <i class="fa-solid fa-car"></i>
          Veículos
        </a>
      </li>
      <li class="nav-item <?= $url == 'maintenances' ? 'selected' : '' ?>">
        <a href="./maintenances">
          <i class="fa-solid fa-gears"></i>
          Manutenções
        </a>
      </li>
      <li class="nav-item">
        <a href="?logout">
          <i class="fa-solid fa-right-from-bracket"></i>
          Sair
        </a> 
      </li>
    </ul>
  </nav>

  <div class="logo">
    <a href="home">
      <i class="fa-solid fa-microchip"></i>
      CarTec
    </a>
  </div>
</div>