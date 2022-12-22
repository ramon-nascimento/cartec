<?php
namespace CarTec\Controllers;

use CarTec\Views\MainView;

class HomeController {
  public function index() {
    MainView::render('home');    
  }
}