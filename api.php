<?php
session_start();

require('vendor/autoload.php');

use CarTec\Database\Database;

$maintenances = Database::get(
  "*", 
  from: "maintenances", 
  where: "car_owner = '{$_SESSION['User']['ID']}'",
  orderBy: "id ASC"
);

$response = [];

foreach ($maintenances as $maintenance) {
  $car = Database::get("name, model, version", from: "cars", where: "id = '{$maintenance['car_id']}'");

  $maintenanceDate = new DateTime($maintenance['date']);
  $currentDate = new DateTime();
  $dateDiff = $maintenanceDate->diff($currentDate);

  if ($dateDiff->days > 7) continue;

  $maintenanceDate = $maintenanceDate->format('d/m/Y');

  array_push($response, [
    $car['name'], 
    $car['model'], 
    $car['version'], 
    $maintenance['description'], 
    $maintenanceDate
  ]);
}

echo json_encode($response);
?>