<?php
namespace CarTec\Models;

use CarTec\Utils;
use CarTec\Database\Database;

class LoginModel {
  public static function handleLogin($email, $password) {
    $loginResponse = self::verifyLogin($email, $password);

    if ($loginResponse['response'] == 'sucesso') {
      $_SESSION['User'] = [
        "ID" => $loginResponse['data']['id'],
        "Username" => $loginResponse['data']['username'],
        "Email" => $loginResponse['data']['email']
      ];
      
      Utils::redirectTo('./home');
    } else {
      echo "<p class='error'>Erro: {$loginResponse['response']}</p>";
    }
  }

  public static function verifyLogin($email, $password) {
    $userData = Database::get("id, username, email, password", from: "users", where: "email = '{$email}'");

    if ($userData) {
      $passwordData = $userData['password'];

      if (password_verify($password, $passwordData)) {
        return ['response' => 'sucesso', 'data' => $userData];
      } else {
        return ['response' => 'senha inválida.'];
      }
    } else {
      return ['response' => 'e-mail não cadastrado.'];
    }
  }
}