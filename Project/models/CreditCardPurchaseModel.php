<?php
  include_once 'Utility.php';

  /**
   * Class that represents the table credit_card_purchase of the
   * database.
   */
  class CreditCardPurchaseModel {

    private $conn;
    private $table = 'credit_card_purchase';

    public $number_fees;
    public $amount;
    public $isJavecoins;
    public $id;
    public $credit_card_id;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
      $this->conn = $db;
    }

    /**
     * Gets all credit card's accounts.
     */
    public function getAllCreditCardPurchases() {
      $query = 'SELECT * FROM ' . $this->table . ' WHERE $credit_card_id = :$credit_card_id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':$credit_card_id', $this->$credit_card_id);
      $stmt->execute();
      $result = Utility::stmtToArray($stmt);
      return $result;
    }

    /**
     * Adds a new purchase to the credit card with id $credit_card_id
     */
    public function createCreditCardPurchase() {
      $query = 'INSERT INTO ' . $this->table . '
                SET
                  number_fees = :number_fees,
                  amount = :amount,
                  isJavecoins = :isJavecoins,
                  credit_card_id = :credit_card_id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':number_fees', $this->number_fees);
      $stmt->bindParam(':amount', $this->amount);
      $stmt->bindParam(':isJavecoins', $this->isJavecoins);
      $stmt->bindParam(':credit_card_id', $this->credit_card_id);
      if($stmt->execute()) return true;
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
  }
