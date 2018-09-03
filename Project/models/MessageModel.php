<?php

include_once 'Utility.php';
/**
 * Class that represents the table Message in the data base.
 * this class retrives and writes to the DB.
 */
class MessageModel {

    private $conn;
    private $table = 'message';

    public $content;
    public $user_id;

    /**
     * Receives a Database object for the class to have
     * access to the database.
     */
    function __construct($db) {
        $this->conn = $db;
    }



    /**
     * Return all message sent a user
     * a class property.
     */
    public function getMessageByUserId() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        $result = Utility::stmtToArray($stmt);
        return $result;
    }

    /**
     * Creates a Mesagge with the content of the class properities.
     */
    public function createMessage() {
        $query = 'INSERT INTO ' . $this->table . ' SET content = :content, user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':user_id', $this->user_id);
        if($stmt->execute()) return true;
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



}