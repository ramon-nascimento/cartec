<?php
use CarTec\Database\Database;

$types = Database::get("*", from: "car_type");
?>
<div class="backdrop" onclick="Modal.close()" ></div>
<div class="modal">
  <header>
    <h3 class="title">
      Tipo de Veículo
    </h3>
  </header>
  
  <section class="modal-body">
    <form class="form" method="post">
      <label class="form-control">
        <input type="text" placeholder="Descrição do tipo de veículo" name="carType" required>

        <span class="input-icon">
          <i class="fa-solid fa-car"></i>
        </span>
      </label>
      
      <h5 style="text-align:center;">Tipos Cadastrados</h5>
      <div class="types-list">
        <?php foreach ($types as $type): ?>
          <span><?= $type['description'] ?></span>
        <?php endforeach; ?>
      </div>
      
      <div class="form-actions">
        <button type="submit" name="addNewType" onclick="handleLoadingButton.show(this)">
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