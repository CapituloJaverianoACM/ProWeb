<?php
  include_once 'Utility.php';

 /**
  * Class that represents the table savings_account in the data base.
  * this class retrives and writes to the DB.
  */
  class SavingsAccountModel {

    private $conn;
    private $table = 'savings_account';

    public $balance;
    public $id;
    public $interest_rate;
    public $user_id;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
      $this->conn = $db;
    }

    /**
     * Gets all clinets accounts.
     */
    public function getAllClientsAccounts() {
      $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id ORDER by balance DESC';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->execute();
      $result = Utility::stmtToArray($stmt);
      return $result;
    }

    /**
     * Gets all accounts.
     */
    public function getAllAccounts() {
      $query = 'SELECT * FROM ' . $this->table;
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->execute();
      $result = Utility::stmtToArray($stmt);
      return $result;
    }

    /**
     * Creates a new savings account with the values
     * assigned to this class properties.
     */
    public function createSavingsAccount() {
      $query = 'INSERT INTO ' . $this->table . '
                SET
                  balance = :balance,
                  interest_rate = :interest_rate,
                  user_id = :user_id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':balance', $this->balance);
      $stmt->bindParam(':interest_rate', $this->interest_rate);
      $stmt->bindParam(':user_id', $this->user_id);
      if($stmt->execute()) return true;
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    /**
     * Updates the row with the setted with the current atributes.
     */
    public function updateAccount() {
      $query = 'UPDATE ' . $this->table . '
                SET
                  balance = :balance,
                  interest_rate = :interest_rate
                WHERE
                  id = :id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':balance', $this->balance);
      $stmt->bindParam(':interest_rate', $this->interest_rate);
      $stmt->bindParam(':id', $this->id);
      if($stmt->execute()) return true;
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    /**
     * Gets from the database the savings account that matches
     * the id provided.
     */
    public function getSavingAccountById() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->balance = $result[0]['balance'];
        $this->interest_rate = $result[0]['interest_rate'];
        $this->user_id = $result[0]['user_id'];
        return $result;
    }

    /**
     * Deletes from the database the savings account that matches
     * the id provided.
     */
    public function deleteSavingAccoutById(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        return false;
    }

    /**
     * Gets the sum of all of the client's accounts
     */

    public function getClientTotalMoney() {
        $query = 'SELECT SUM(balance) AS total_money FROM ' . $this->table . ' WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt)[0]['total_money'];
        return $result;
    }

  }
