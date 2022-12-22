<?php

use CarTec\Views\MainView;
use CarTec\Database\Database;

MainView::renderHeader('Manutenções | CarTec');
MainView::render('includes/navbar');

$username = explode('.', $_SESSION['User']['Username'])[0];
$username = ucfirst(strtolower($username));

$maintenances = Database::get(
  "*", 
  from: "maintenances", 
  where: "car_owner = '{$_SESSION['User']['ID']}'",
  orderBy: "date DESC"
);
?>
<main class="card" style="margin-top: 2rem;"> 
  <header>
    <h4>Cadastre e agende manutenções para os seus veículos</h4>
  </header>

  <?php 
    if (empty($maintenances)): 
      echo '<p style="text-align: center;">Você ainda não cadastrou nenhuma manutenção.</p>'; 
    else: 
  ?>
    <table class="table">
      <thead class="table-header">
        <tr class="table-row">
          <th>Veículo</th>
          <th>Marca / Modelo</th>
          <th>Versão</th>
          <th>Serviço</th>
          <th>Data</th>
        </tr>
      </thead>

      <tbody class="table-body">
          <?php 
            foreach ($maintenances as $maintenance):
              $car = Database::get("name, model, version", from: "cars", where: "id = {$maintenance['car_id']}");
              $maintenanceDate = new DateTime($maintenance['date']);
          ?>
            <tr class="table-row">
              <td><?= $car['name'] ?></td>
              <td><?= $car['model'] ?></td>
              <td><?= $car['version'] ?></td>
              <td><?= $maintenance['description'] ?></td>
              <td><?= $maintenanceDate->format('d/m/Y') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

  <div class="card-actions">
   <a href="?newMaintenance">
      <button>
        <i class="fa-solid fa-plus"></i>
        Nova manutenção
      </button>
    </a>
  </div>
</main>
<?= MainView::renderFooter(); ?>