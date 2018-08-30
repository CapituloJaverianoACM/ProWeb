<?php
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
      $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
    }

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


  }
