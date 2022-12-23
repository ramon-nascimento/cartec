<?php
namespace CarTec\Controllers;

use CarTec\Utils;
use CarTec\Views\MainView;
use CarTec\Database\Database;

class MaintenancesController {
  public function index() {
    MainView::render('maintenances');

    if (isset($_GET['newMaintenance'])) {
      MainView::render('includes/new-maintenance');

      if (isset($_POST['registerMaintenance'])) {
        $carID = $_POST['maintenanceCar'];
        $carOwner = $_SESSION['User']['ID'];
        $maintenanceDescription = $_POST['maintenanceDescription'];
        $maintenanceDate = $_POST['maintenanceDate'];

        Database::insertInto("maintenances", [
          $carID, 
          $carOwner, 
          $maintenanceDescription, 
          $maintenanceDate
        ]);
        Utils::redirectTo('maintenances');
      }
    } else if (isset($_GET['editMaintenance'])) {
      MainView::render('includes/edit-maintenance');

      if (isset($_POST['submitEditMaintenance'])) {
        $carID = $_POST['maintenanceCar'];
        $maintenanceDescription = $_POST['maintenanceDescription'];
        $maintenanceDate = $_POST['maintenanceDate'];

        Database::edit("maintenances", [
          "car_id" => $carID,
          "description" => $maintenanceDescription,
          "date" => $maintenanceDate
        ], "id = {$_GET['editMaintenance']}");

        Utils::redirectTo('maintenances');
      }
    } else if (isset($_GET['deleteMaintenance'])) {
      $maintenanceId = $_GET['deleteMaintenance'];

      Database::deleteFrom("maintenances", "id = {$maintenanceId}");
      Utils::redirectTo('maintenances');
    }
  }
}