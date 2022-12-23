<?php
use CarTec\Database\Database;

$carId = $_GET['editCar'];

$car = Database::get("name, plate, model, version, type", from: "cars", where: "id = '{$carId}'");
$types = Database::get("*", from: "car_type");
$currentType = Database::get("description", from: "car_type", where: "id = '{$car['type']}'");
?>
<div class="backdrop" onclick="Modal.close()" ></div>
<div class="modal new-car">
  <header>
    <h3 class="title">
      Editar veículo
    </h3>
  </header>
  
  <section class="modal-body">
    <form class="form" method="post">
      <label class="form-control">
        <input type="text" placeholder="Nome do veículo" name="carName" value="<?= $car['name'] ?>" required>

        <span class="input-icon">
          <i class="fa-solid fa-car"></i>
        </span>
      </label>

      <label class="form-control">
        <input type="text" placeholder="Placa" name="carPlate" value="<?= $car['plate'] ?>" required>

        <span class="input-icon">
          <i class="fa-solid fa-car-side"></i>
        </span>
      </label>

      <label class="form-control">
        <input type="text" placeholder="Marca / Modelo" name="carModel" value="<?= $car['model'] ?>" required>

        <span class="input-icon">
          <i class="fa-solid fa-code-branch"></i>
        </span>
      </label>

      <label class="form-control">
        <input type="text" placeholder="Versão" name="carVersion" value="<?= $car['version'] ?>" required>

        <span class="input-icon">
          <i class="fa-solid fa-code-commit"></i>
        </span>
      </label>

      <label class="form-control">
        <select name="carType">
          <option value="<?= $car['type'] ?>"><?= $currentType['description'] ?></option>
          <?php 
            foreach ($types as $type): 
              if ($type['id'] == $car['type']) continue;
          ?>
            <option value="<?= $type['id'] ?>"><?= $type['description'] ?></option>
          <?php endforeach ?>
        </select>

        <span class="input-icon">
          <i class="fa-solid fa-border-top-left"></i>
        </span>
      </label>      

      <div class="form-actions">
        <button type="submit" name="submitEdit" onclick="handleLoadingButton.show(this)">
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