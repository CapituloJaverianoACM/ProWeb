<?php
  include_once 'Utility.php';

  /**
   * A class that represent the table of Transaction in the database.
   * This class will retrive and put data on the DB.
   */
  class MovementModel {

    private $conn;
    private $table = 'movement';

    public $amount;
    public $type_transfer;
    public $origin_bank;
    public $transfer_cost;
    public $date;
    public $id;
    public $savings_account_id;
    public $destiny;
    public $foreign_account_id;

    function __construct($db) {
      $this->conn = $db;
    }

    public function createMovement() {
       $query = 'INSERT INTO ' . $this->table .
       ' SET
          amount = :amount,
          type_transfer = :type_transfer,
          savings_account_id = :savings_account_id,
          destiny = :destiny,
          foreign_account_id = :foreign_account_id'; # TODO - verify bugs

        if( $this->origin_bank != null )
        {
            $query .= ', origin_bank = :origin_bank';
        }

        $query .= ';';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':type_transfer', $this->type_transfer);
        $stmt->bindParam(':savings_account_id', $this->savings_account_id);
        $stmt->bindParam(':destiny', $this->destiny);
        $stmt->bindParam(':foreign_account_id', $this->foreign_account_id);

        if( $this->origin_bank != null )
        {
            $stmt->bindParam(':origin_bank', $this->origin_bank);
        }



        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;

    }

      /**
       * Gets all client movements .
       */
      public function getAllClientsMovements($user_id) {
          $query = '
            (
            SELECT movement.*
            FROM client
            INNER JOIN savings_account ON client.id = savings_account.user_id
            INNER JOIN movement ON(savings_account.id = movement.savings_account_id OR savings_account.id = movement.destiny)
            WHERE client.id = :user_id
            ) 
            UNION
            (
            SELECT movement.*    
            FROM client
            INNER JOIN credit ON client.id = credit.user_id
            INNER JOIN movement ON credit.id = movement.destiny
            WHERE client.id = :user_id2
            )';


          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':user_id2', $user_id);
          $stmt->execute();
          $result = Utility::stmtToArray($stmt);
          return $result;
      }

  }
