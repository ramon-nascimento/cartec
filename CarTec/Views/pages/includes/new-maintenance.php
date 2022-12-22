<?php
use CarTec\Database\Database;

$cars = Database::get("*", from: "cars", where: "owner_id = {$_SESSION['User']['ID']}");
?>
<div class="backdrop" onclick="Modal.close()" ></div>
<div class="modal new-maintenance">
  <header>
    <h3 class="title">
      Nova Manutenção
    </h3>
  </header>
  
  <section class="modal-body">
    <form class="form" method="post">
      <label class="form-control">
        <select name="maintenanceCar">
          <option value="" selected>Selecione o veículo</option>
          <?php foreach ($cars as $car): ?>
            <option value="<?= $car['id'] ?>"><?= $car['name'] . ' - ' . $car['plate'] ?></option>
          <?php endforeach; ?>
        </select>

        <span class="input-icon">
          <i class="fa-solid fa-car"></i>
        </span>
      </label>       

      <label class="form-control">
        <input type="date" placeholder="Data" name="maintenanceDate" required>

        <span class="input-icon">
          <i class="fa-solid fa-calendar"></i>
        </span>
      </label>  
      
      <label class="form-control">
        <input type="text" placeholder="Descrição da manutenção" name="maintenanceDescription" required>

        <span class="input-icon">
          <i class="fa-solid fa-gears"></i>
        </span>
      </label>

      <div class="form-actions">
        <button type="submit" name="registerMaintenance" onclick="handleLoadingButton.show(this)">
          <i class="fas fa-check"></i>
          Registrar
        </button>

        <button class="danger-btn" type="button" onclick="Modal.close()">
          <i class="fa-solid fa-xmark"></i>
          Cancelar
        </button>
      </div>
    </form>
  </section>
</div>