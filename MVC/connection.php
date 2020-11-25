<?php
  class Db {
    public $db = NULL;

    public function __construct() {
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $this->db = new PDO('mysql:host=localhost;dbname=php_mvc', 'root', '', $pdo_options);
    }
  }
?>