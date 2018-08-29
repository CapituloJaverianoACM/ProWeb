<?php
  /**
   * Generates a connection to the BD using PDO.
   */
  class Database {

    private $host = 'localhost';
    private $db_name = 'ja_bank';
    private $username = 'root';
    private $password = 'root';
    private $conn;


    /**
     * Builds the dsn for the PDO connection. Connects to the data base
     * if there is an error, it will print it.
     */
    public function connect() {
      $this->conn = null;
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
      try {
        $this->conn = new PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
