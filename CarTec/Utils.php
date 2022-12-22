<?php
namespace CarTec;

class Utils {
  public static function openModal($title, $body, $actionText = 'OK', $action = '') {
    echo "<script>Modal.open(`{$title}`, `{$body}`, `{$actionText}`,`{$action}`)</script>";
  }

  public static function redirectTo($url) {
    echo "<script>window.location.href='{$url}'</script>";
    die();
  }
}