<?php

use CarTec\Views\MainView;
use CarTec\Database\Database;

MainView::renderHeader('Veículos | CarTec');
MainView::render('includes/navbar');

$cars = Database::get("*", from: "cars", where: "owner_id = {$_SESSION['User']['ID']}");
?>
<main class="card" style="margin-top: 2rem;"> 
  <header>
    <h4>Veículos Cadastrados</h4>
  </header>

  <?php 
    if (empty($cars)): 
      echo '<p style="text-align: center;">Você ainda não cadastrou nenhum veículo.</p>'; 
    else: 
  ?>
    <table class="table">
      <thead class="table-header">
        <tr class="table-row">
          <th>Nome</th>
          <th>Placa</th>
          <th>Marca / Modelo</th>
          <th>Versão</th>
          <th>Tipo</th>
          <th>Editar</th>
          <th>Remover</th>
        </tr>
      </thead>

      <tbody class="table-body">
          <?php 
            foreach ($cars as $car):
              $carType = Database::get("description", from: "car_type", where: "id = {$car['type']}")
          ?>
            <tr class="table-row">
              <td><?= $car['name'] ?></td>
              <td><?= $car['plate'] ?></td>
              <td><?= $car['model'] ?></td>
              <td><?= $car['version'] ?></td>
              <td><?= $carType['description'] ?></td>
              <td class="actions edit">
                <a href="?editCar=<?= $car['id'] ?>">
                  <i class="fa-regular fa-pen-to-square"></i>
                </a>
              </td>
              <td class="actions delete">
                <a href="?deleteCar=<?= $car['id'] ?>">                
                  <i class="fa-solid fa-ban"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

  <div class="card-actions flex" style="justify-content: space-between; gap: .5rem;">
    <a href="?newCar" style="width: 100%;">
      <button>
        <i class="fa-solid fa-plus"></i>
        Novo veículo
      </button>
    </a>
    <a href="?newCarType" style="width: 100%;">
      <button>
        <i class="fa-solid fa-plus"></i>
        Novo tipo
      </button>
    </a>
  </div>

</main>
<?= MainView::renderFooter(); ?>