<?php
namespace CarTec\Models;

use CarTec\Utils;
use CarTec\Database\Database;

class SingupModel {
  public static function handleSingup($user, $email, $password, $passwordConfirmation) {
    $singupResponse = self::verifySingup($email, $password, $passwordConfirmation);

    if ($singupResponse['response'] == 'sucesso') {
      $password = password_hash($passwordConfirmation, PASSWORD_DEFAULT);

      Database::insertInto("users", [$user, $email, $password]);
      Utils::redirectTo('login');
    } else {
      echo "<p class='error'>Erro: {$singupResponse['response']}</p>";
    }
  }

  public static function verifySingup($email, $password, $passwordConfirmation) {
    $userData = Database::get("email", from: "users", where: "email = '{$email}'");

    if ($userData) {
      return ['response' => 'e-mail já cadastrado.'];

    } else if (strlen($password) < 6 || strlen($passwordConfirmation) < 6) {
      return ['response' => 'sua senha possuí menos de 6 caracteres.'];

    } else if ($password != $passwordConfirmation)  {
      return ['response' => 'as senhas não são iguais.'];
      
    } else {
      return ['response' => 'sucesso'];
    }
  }
}