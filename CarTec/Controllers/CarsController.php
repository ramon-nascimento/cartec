<?php
namespace CarTec\Controllers;

use CarTec\Models\CarsModel;
use CarTec\Views\MainView;

class CarsController {
  public function index() {
    MainView::render('cars');

    if (isset($_GET['newCar'])) {
      MainView::render('includes/new-car');

      if (isset($_POST['addNewCar'])) {
        $name = $_POST['carName'];
        $plate = $_POST['carPlate'];
        $model = $_POST['carModel'];
        $version = $_POST['carVersion'];
        $type = $_POST['carType'];
        $owner = $_SESSION['User']['ID'];

        CarsModel::handleAddCar($name, $plate, $model, $version, $type, $owner);
      }
    } else if (isset($_GET['newCarType'])) {
      MainView::render('includes/new-type');

      if (isset($_POST['addNewType'])) {
        $type = $_POST['carType'];

        CarsModel::handleAddType($type);        
      }
    }
  }
}