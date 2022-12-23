<?php
use CarTec\Database\Database;

$maintenanceId = $_GET['editMaintenance'];

$cars = Database::get("*", from: "cars", where: "owner_id = {$_SESSION['User']['ID']}");
$currentCar = Database::get("id, name, plate", from: "cars", where: "id = {$maintenanceId}");
$maintenance = Database::get("description, date", from: "maintenances", where: "id = {$maintenanceId}");
?>
<div class="backdrop" onclick="Modal.close()" ></div>
<div class="modal new-maintenance">
  <header>
    <h3 class="title">
      Editar Manutenção
    </h3>
  </header>
  
  <section class="modal-body">
    <form class="form" method="post">
      <label class="form-control">
        <select name="maintenanceCar">
          <option value="<?= $currentCar['id'] ?>" selected>
            <?= $currentCar['name'] . ' - ' . $currentCar['plate'] ?>
          </option>

          <?php 
            foreach ($cars as $car):
              if ($car['id'] == $currentCar['id']) continue; 
          ?>          
            <option value="<?= $car['id'] ?>"><?= $car['name'] . ' - ' . $car['plate'] ?></option>
          <?php endforeach; ?>
        </select>

        <span class="input-icon">
          <i class="fa-solid fa-car"></i>
        </span>
      </label>       

      <label class="form-control">
        <input type="date" placeholder="Data" name="maintenanceDate" value="<?= $maintenance['date'] ?>" required>

        <span class="input-icon">
          <i class="fa-solid fa-calendar"></i>
        </span>
      </label>  
      
      <label class="form-control">
        <input 
          type="text" 
          placeholder="Descrição da manutenção" 
          name="maintenanceDescription" 
          value="<?= $maintenance['description'] ?>"
          required
          >

        <span class="input-icon">
          <i class="fa-solid fa-gears"></i>
        </span>
      </label>

      <div class="form-actions">
        <button type="submit" name="submitEditMaintenance" onclick="handleLoadingButton.show(this)">
          <i class="fas fa-check"></i>
          Editar
        </button>

        <button class="danger-btn" type="button" onclick="Modal.close()">
          <i class="fa-solid fa-xmark"></i>
          Cancelar
        </button>
      </div>
    </form>
  </section>
</div>