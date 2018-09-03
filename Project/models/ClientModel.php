<?php

    include_once 'Utility.php';

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
       $query = 'SELECT * FROM ' . $this->table;
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       $result = Utility::stmtToArray($stmt);
       return $result;
     }

     /**
      * Returns the user that matches the username seated as
      * a class property.
      */
     public function getClientByUsername() {
       $query = 'SELECT * FROM ' . $this->table . ' WHERE username = ?';
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->username);
       $stmt->execute();
       $result = Utility::stmtToArray($stmt)[0];
       //$this->password = $result['password'];
       $this->isAdmin = $result['isAdmin'];
       $this->id = $result['id'];
       return $result;
     }

      /**
       * Returns the user that matches the id seated as
       * a class property.
       */
      public function getClientById() {
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
          $stmt->execute();
          $result = Utility::stmtToArray($stmt)[0];
          $this->password = $result['password'];
          $this->isAdmin = $result['isAdmin'];
          $this->username = $result['username'];
          return $result;
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

     /**
      * Check if user matches password;
      */
    public function checkUserLogin() {
      $fetchedUser = $this->getClientByUsername();
      print_r($fetchedUser);
      print_r("<br>");
      print_r($this->password);
      $trueHash = $fetchedUser['password'];
      $this->id = $fetchedUser['id'];
      return password_verify($this->password, $trueHash);
    }

    public function updateClient() {
        $query = 'UPDATE ' . $this->table .
            ' SET 
                username = :username, 
                isAdmin = :isAdmin
             WHERE 
                id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':isAdmin', $this->isAdmin);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
    }


    public function deleteUserById() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        return false;
    }

  }
