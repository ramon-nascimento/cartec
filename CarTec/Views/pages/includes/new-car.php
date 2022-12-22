<?php
use CarTec\Database\Database;

$types = Database::get("*", from: "car_type");
?>
<div class="backdrop" onclick="Modal.close()" ></div>
<div class="modal new-car">
  <header>
    <h3 class="title">
      Cadastro de veículo
    </h3>
  </header>
  
  <section class="modal-body">
    <form class="form" method="post">
      <label class="form-control">
        <input type="text" placeholder="Nome do veículo" name="carName" required>

        <span class="input-icon">
          <i class="fa-solid fa-car"></i>
        </span>
      </label>

      <label class="form-control">
        <input type="text" placeholder="Placa" name="carPlate" required>

        <span class="input-icon">
          <i class="fa-solid fa-car-side"></i>
        </span>
      </label>

      <label class="form-control">
        <input type="text" placeholder="Marca / Modelo" name="carModel" required>

        <span class="input-icon">
          <i class="fa-solid fa-code-branch"></i>
        </span>
      </label>

      <label class="form-control">
        <input type="text" placeholder="Versão" name="carVersion" required>

        <span class="input-icon">
          <i class="fa-solid fa-code-commit"></i>
        </span>
      </label>

      <label class="form-control">
        <select name="carType">
          <option value="" selected>Selecione o tipo de veículo</option>
          <?php foreach ($types as $type): ?>
            <option value="<?= $type['id'] ?>"><?= $type['description'] ?></option>
          <?php endforeach ?>
        </select>

        <span class="input-icon">
          <i class="fa-solid fa-border-top-left"></i>
        </span>
      </label>      

      <div class="form-actions">
        <button type="submit" name="addNewCar" onclick="handleLoadingButton.show(this)">
          <i class="fas fa-check"></i>
          Cadastrar
        </button>

        <button class="danger-btn" type="button" onclick="Modal.close()">
          <i class="fa-solid fa-xmark"></i>
          Cancelar
        </button>
      </div>
    </form>
  </section>
</div>