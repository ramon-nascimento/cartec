<?php
namespace CarTec\Database;

use CarTec\Utils;

class Database {
  private static $pdo;
  
  public static function conn() {
    $host = 'localhost';
    $db_name = 'cartec';
    $db_user = 'root';
    $db_pass = '';

    if (self::$pdo == null) {
      try {
        self::$pdo = new \PDO("mysql:host={$host};dbname={$db_name}",
          $db_user, 
          $db_pass, 
          array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
      } catch (\Exception $e) {
        echo "Erro ao conectar-se com o banco: {$e->getMessage()}";
      }
    }

    return self::$pdo;
  }

  public static function createTable($name, $columns) {
    $conn = self::conn();

    $columns = implode(', ', $columns);
    $query = "CREATE TABLE {$name} (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), {$columns})";

    try {
      $conn->exec($query);

      Utils::openModal("Sucesso!", "A tabela {$name} foi criada com sucesso!", action: "Modal.close()");
    } catch (\Exception $e) {
      Utils::openModal("Erro!", "O seguinte erro ocorreu: {$e->getMessage()}.", action: "Modal.close()");
    }
  }

  public static function get($data, $from, $where = '', $orderBy = '') {
    $conn = self::conn();

    $query = "SELECT {$data} FROM {$from} ";

    if ($where) $query .= "WHERE {$where}";
    if ($orderBy) $query .= "ORDER BY {$orderBy}";

    $response = $conn->prepare($query);
    $response->execute();

    $response = $data != "*" ? $response->fetch(\PDO::FETCH_ASSOC) : $response->fetchAll();

    return $response;
  }

  public static function insertInto($table, $data) {
    $conn = self::conn();

    foreach($data as $value) {
      $values[] = "'{$value}'";
    }
    
    $values = implode(', ', $values);
    $query = "INSERT INTO {$table} VALUES (NULL, {$values})";

    $conn->exec($query);
  }

  public static function edit($table, $data, $where) {
    $conn = self::conn();

    foreach($data as $key => $value) {
      $values[] = "{$key} = '{$value}'";
    }
    
    $values = implode(', ', $values);
    $query = "UPDATE {$table} SET {$values} WHERE {$where}";

    $conn->exec($query);
  }

  public static function deleteFrom($table, $data) {
    $conn = self::conn();

    $conn->exec("DELETE FROM {$table} WHERE id = {$data}");
  }
}