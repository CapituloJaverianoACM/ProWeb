<?php
include_once 'Utility.php';

/**
 * Class that represent the admins constants on the DB.
 */

class AdminConstant {
    private $conn;
    private $table = 'admin_constant';
    private $id = 1;

    public $guest_credit_fee;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
        $this->conn = $db;
    }

    public function getGuestCreditFee() {
        $query = 'SELECT guest_credit_fee FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->guest_credit_fee = $result[0]['guest_credit_fee'];
        return $result[0]['guest_credit_fee'];
    }

    public function setGuestCreditFee() {
        $query = 'UPDATE ' . $this->table .'
                SET
                    guest_credit_fee = :guest_credit_fee
                WHERE
                    id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':guest_credit_fee', $this->guest_credit_fee);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
