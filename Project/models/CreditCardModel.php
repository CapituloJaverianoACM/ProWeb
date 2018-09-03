<?php
  include_once 'Utility.php';

  /**
   * Class that represents the table credit_card in the data base.
   * this class retrives and writes to the DB.
   */
  class CreditCardModel {

    private $conn;
    private $table = 'credit_card';

    public $max_capacity;
    public $id;
    public $overbook;
    public $handling_fee;
    public $interest_rate;
    public $user_id;
    public $consumed;
    public $isAproved;
    public $savings_account_id;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
      $this->conn = $db;
      $this->consumed = 0;
    }

    /**
     * Gets all clinets credit cards.
     */
    public function getClientCreditCards() {
      $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->execute();
      $result = Utility::stmtToArray($stmt);
      return $result;
    }

    /**
     * Gets all credits.
     */
     public function getAllCreditCards() {
       $query = 'SELECT * FROM ' . $this->table;
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       $result = Utility::stmtToArray($stmt);
       return $result;
     }

    /**
     * Creates a new credit card with the values of the class's
     * properties.
     */
    public function createCreditCard() {
      $query = 'INSERT INTO ' . $this->table . '
                SET
                  max_capacity= :max_capacity,
                  overbook = :overbook,
                  handling_fee = :handling_fee,
                  interest_rate= :interest_rate,
                  user_id = :user_id,
                  consumed = :consumed,
                  savings_account_id = :savings_account_id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':max_capacity', $this->max_capacity);
      $stmt->bindParam(':overbook', $this->overbook);
      $stmt->bindParam(':handling_fee', $this->handling_fee);
      $stmt->bindParam(':interest_rate', $this->interest_rate);
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':consumed', $this->consumed);
        $stmt->bindParam(':savings_account_id', $this->savings_account_id);
      if($stmt->execute()) return true;
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    /**
     * Gets from the database the credit card that matches
     * the id provided.
     */
    public function getCreditCardById() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->max_capacity = $result[0]['max_capacity'];
        $this->overbook = $result[0]['overbook'];
        $this->handling_fee = $result[0]['handling_fee'];
        $this->interest_rate = $result[0]['interest_rate'];
        $this->user_id = $result[0]['user_id'];
        $this->consumed = $result[0]['consumed'];
        $this->isAproved = $result[0]['isAproved'];
        return $result;
    }

    /**
     * Updates the row with the setted with the current atributes.
     */
    public function updateCreditCard() {
      $query = 'UPDATE ' . $this->table . '
                SET
                  max_capacity= :max_capacity,
                  overbook = :overbook,
                  handling_fee = :handling_fee,
                  interest_rate= :interest_rate,
                  user_id = :user_id,
                  consumed = :consumed,
                  isAproved = :isAproved
                WHERE
                  id = :id';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':max_capacity', $this->max_capacity);
      $stmt->bindParam(':overbook', $this->overbook);
      $stmt->bindParam(':handling_fee', $this->handling_fee);
      $stmt->bindParam(':interest_rate', $this->interest_rate);
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':consumed', $this->consumed);
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':isAproved', $this->isAproved);
      if($stmt->execute()) return true;
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    /**
     * Gets the un aproved credit cards.
     */

    public function getUnAprovedCreditCards() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE isAproved = 0';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        return $result;

    }

      /**
       * Gets the aproved credit cards.
       */

      public function getAprovedCreditCards() {
          $query = 'SELECT * FROM ' . $this->table . ' WHERE isAproved = 1';
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
          $result = Utility::stmtToArray($stmt);
          return $result;

      }

  }
