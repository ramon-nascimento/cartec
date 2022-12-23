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
    } else if (isset($_GET['deleteCar'])) {
      $carId = $_GET['deleteCar'];

      CarsModel::handleDelete($carId);
    } else if (isset($_GET['editCar'])) {
      MainView::render('includes/edit-car');

      if (isset($_POST['submitEdit'])) {
        $id = $_GET['editCar'];
        $name = $_POST['carName'];
        $plate = $_POST['carPlate'];
        $model = $_POST['carModel'];
        $version = $_POST['carVersion'];
        $type = $_POST['carType'];

        CarsModel::handleUpdate($id, $name, $plate, $model, $version, $type);
      }
    }
  }
}