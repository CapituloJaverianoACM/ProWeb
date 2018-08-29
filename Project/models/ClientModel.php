<?php

  /**
   * Class that represents the table client in the data base.
   * this class retrives and writes to the DB.
   */
  class ClientModel {

    private $conn;
    private $table = 'client';

    public $username;
    public $password;
    public $isAdmin;
    public $id;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
      $this->conn = $db;
      $this->isAdmin = FALSE;
    }

    /**
     * Gets all the users from the database;
     */
     public function getAllClients() {
       $query = 'SELECT * FROM ' . $table;
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
     }

     /**
      * Returns the user that matches the username seted as
      * a class property.
      */
     public function getClientByUsername() {
       $query = 'SELECT * FROM ' . $table . 'WHERE username = ?';
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->username);
       $stmt->execute();
       return $stmt;
     }

     /**
      * Creates a user with the content of the class properities. This function
      * hashes the client's password.
      */
     public function createClient() {
       $query = 'INSERT INTO ' . $this->table . ' SET username = :username, password = :password';
       $stmt = $this->conn->prepare($query);
       $hash = password_hash($this->password, PASSWORD_DEFAULT);
       $stmt->bindParam(':username', $this->username);
       $stmt->bindParam(':password', $hash);
       if($stmt->execute()) return true;
       printf("Error: %s.\n", $stmt->error);
       return false;
     }
  }
