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
    }
  }
}