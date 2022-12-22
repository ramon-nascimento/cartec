<?php
namespace CarTec\Controllers;

use CarTec\Views\MainView;
use CarTec\Models\LoginModel;

class LoginController {
  public function index() {
    if (isset($_SESSION['User'])) {
      MainView::render('home');
    } else {
      MainView::render('login');

      if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        LoginModel::handleLogin($email, $password);          
      }
    }
  }
}