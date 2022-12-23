<?php
namespace CarTec\Models;

use CarTec\Utils;
use CarTec\Database\Database;

class CarsModel {
  public static function handleAddCar($name, $plate, $model, $version, $type, $owner) {
    $verifiedCarPlate = self::verifyCarPlate($plate);

    if ($verifiedCarPlate['response'] == 'sucesso') {
      Database::insertInto("cars", [$name, $plate, $model, $version, $type, $owner]);
      Utils::redirectTo('cars');
    }

    echo "<p class='error'>Erro: placa já cadastrada</p>";
  }

  public static function verifyCarPlate($plate) {
    $carData = Database::get("plate", from: "cars", where: "plate = '{$plate}'");

    if ($carData) {
      return ['response' => 'placa já cadastrada.'];
    }

    return ['response' => 'sucesso'];
  }

  public static function handleAddType($type) {
    $typeData = Database::get("description", from: "car_type", where: "description = '{$type}'");

    if ($typeData) {
      echo "<p class='error'>Erro: o tipo de veículo '{$type}' já está cadastrado.</p>";
      return;
    }

    Database::insertInto("car_type", [$type]);
    Utils::redirectTo('cars');
  }
  
  public static function handleDelete($carId) {
    Database::deleteFrom('cars', where: "id = {$carId}");
    Database::deleteFrom('maintenances', where: "car_id = {$carId}");
    
    Utils::redirectTo('cars');
  }

  public static function handleUpdate($id, $name, $plate, $model, $version, $type) {
    Database::edit('cars', [
      'name' => $name, 
      'plate' => $plate, 
      'model' => $model, 
      'version' => $version, 
      'type' => $type
    ], "id = '{$id}'");

    Utils::redirectTo('cars');
  }
}