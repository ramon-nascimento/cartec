<?php
namespace CarTec\Views;

class MainView {
  private static $assetsPath = './CarTec/Views/assets';

  public static function render($page) {
    $pagePath = "./CarTec/Views/pages/{$page}.php";

    if (file_exists($pagePath)) {
      include($pagePath);
    } else {
      include('./CarTec/Views/pages/404.php');
      die();
    }
  }

  public static function renderHeader($title, $stylesheet = 'style') {
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <title>{$title}</title>

      <link rel="icon" type="image/jpeg" href="./CarTec/Views/assets/images/logo.png" />
      <link rel="stylesheet" href="./CarTec/Views/css/{$stylesheet}.css"/>
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>

    EOT;
  }

  public static function renderFooter() {
    echo <<<EOT
      <script src='./CarTec/Views/js/Modal.js'></script>
      <script src='./CarTec/Views/js/app.js'></script>
      <!-- <script src='/CarTec/Views/js/Ajax.js'></script> -->
    </body>
    </html>
    EOT;
  }
}