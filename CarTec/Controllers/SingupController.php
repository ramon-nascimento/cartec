<?php
namespace CarTec\Controllers;

use CarTec\Views\MainView;
use CarTec\Models\SingupModel;

class SingupController {
  public function index() {
    MainView::render('singup');

    if (isset($_POST['singup'])) {
      $user = $_POST['user'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $passwordConfirmation = $_POST['passwordConfirmation'];
      
      SingupModel::handleSingup($user, $email, $password, $passwordConfirmation);
    }
  }
}