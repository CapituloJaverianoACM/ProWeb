<?php
  include_once 'Utility.php';

  /**
   * Class that represents the table credit of the data base, this
   * can retreive and post data in the table credit of the data base.
   */
   class CreditModel {

     private $conn;
     private $table = 'credit';

     public $interest_rate;
     public $pay_date;
     public $loan_amount;
     public $balance;
     public $isAproved;
     public $late_payment_fee;
     public $id;
     public $guest_email;
     public $user_id;

     /**
      * Receives a Database object for the class to have
      * access to the database.
      */
     function __construct($db) {
       $this->conn = $db;
     }

     /**
      * Gets all credits from a specific client.
      * TODO: Only get aproved credits.
      */
      public function getAllClientsCredits() {
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
       public function getAllCredits() {
         $query = 'SELECT * FROM ' . $this->table;
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         $result = Utility::stmtToArray($stmt);
         return $result;
       }

      /**
       * Updates the row with the setted with the current atributes.
       */
      public function updateCredit() {
        $query = 'UPDATE ' . $this->table . '
                  SET
                    balance = :balance
                  WHERE
                    id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':balance', $this->balance);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
      }

      /**
       * Gets from the database the credit that matches
       * the id provided.
       */
      public function getCreditById() {
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(':id', $this->id);
          $stmt->execute();
          $result = Utility::stmtToArray($stmt);
          $this->balance = $result[0]['balance'];
          $this->pay_date = $result[0]['pay_date'];
          $this->loan_amount = $result[0]['loan_amount'];
          $this->isAproved = $result[0]['isAproved'];
          $this->late_payment_fee = $result[0]['late_payment_fee'];
          $this->guest_email = $result[0]['guest_email'];
          $this->interest_rate = $result[0]['interest_rate'];
          $this->user_id = $result[0]['user_id'];
          return $result;
      }

      /**
       * Creates a credit to a client.
       */
       public function createCreditToClient() {
         $query = 'INSERT INTO ' . $this->table . '
                   SET
                     balance = :balance,
                     interest_rate = :interest_rate,
                     user_id = :user_id,
                     pay_date = :pay_date,
                     loan_amount = :loan_amount,
                     late_payment_fee = :late_payment_fee,
                     isAproved = :isAproved';
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':balance', $this->balance);
         $stmt->bindParam(':interest_rate', $this->interest_rate);
         $stmt->bindParam(':user_id', $this->user_id);
         $stmt->bindParam(':pay_date', $this->pay_date);
         $stmt->bindParam(':loan_amount', $this->loan_amount);
         $stmt->bindParam(':late_payment_fee', $this->late_payment_fee);
         $stmt->bindParam(':isAproved', $this->isAproved);
         if($stmt->execute()) return true;
         printf("Error: %s.\n", $stmt->error);
         return false;
       }
   }
