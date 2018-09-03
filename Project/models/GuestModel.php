<?php
include_once 'Utility.php';

/**
 * Class that represents the table guest in the data base.
 * this class retrives and writes to the DB.
 */

class GuestModel {
    private $conn;
    private $table = 'guest';

    public $email;
    public $cedula;

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
    public function getAllGuests() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        return $result;
    }

    /**
     * Creates a guest with the content of the class properities. This function
     * hashes the client's password.
     */
    public function createGuest() {
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, cedula = :cedula';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cedula', $this->cedula);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    /**
     * Gets the guest by email
     */

    public function getGuestByEmail() {
        $query = 'SELECT * FROM ' . $this->table . 'WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        return $result;
    }

    /**
     * Checks if the guest is alrready registered
     */
    public function isEmailRegister() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        return count($result) > 0;
    }

}