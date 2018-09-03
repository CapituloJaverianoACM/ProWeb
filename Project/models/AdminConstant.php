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
    public $default_savings_interest;
    public $transfer_cost;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
        $this->conn = $db;
    }

    public function getConstants() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->guest_credit_fee = $result[0]['guest_credit_fee'];
        $this->default_savings_interest = $result[0]['default_savings_interest'];
        return $result[0]['guest_credit_fee'];
    }

    public function getGuestCreditFee() {
        $query = 'SELECT guest_credit_fee FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->guest_credit_fee = $result[0]['guest_credit_fee'];
        return $result[0]['guest_credit_fee'];
    }

    public function getSavingsInterestRate() {
        $query = 'SELECT default_savings_interest FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->default_savings_interest = $result[0]['default_savings_interest'];
        return $result[0]['default_savings_interest'];
    }

    public function getTransferCost() {
        $query = 'SELECT transfer_cost FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        $this->transfer_cost = $result[0]['transfer_cost'];
        return $result[0]['transfer_cost'];
    }

    public function updateConstants() {
        $query = 'UPDATE ' . $this->table .'
                SET
                    guest_credit_fee = :guest_credit_fee,
                    default_savings_interest = :default_savings_interest,
                    transfer_cost = :transfer_cost
                    
                WHERE
                    id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':guest_credit_fee', $this->guest_credit_fee);
        $stmt->bindParam(':default_savings_interest', $this->default_savings_interest);
        $stmt->bindParam(':transfer_cost', $this->transfer_cost);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
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

    public function setSavingsInterest() {
        $query = 'UPDATE ' . $this->table .'
                SET
                    default_savings_interest = :default_savings_interest
                WHERE
                    id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':default_savings_interest', $this->default_savings_interest);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function setTransferCost() {
        $query = 'UPDATE ' . $this->table .'
                SET
                    transfer_cost = :transfer_cost
                WHERE
                    id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':transfer_cost', $this->transfer_cost);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
