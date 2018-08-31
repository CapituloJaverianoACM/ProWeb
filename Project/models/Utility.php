<?php
  /**
   * a class that contains utility methods.
   */

   class Utility{

     /**
      * Turns query to an array.
      */
     public static function stmtToArray($stmt) {
       $result = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         array_push($result, $row);
       }
       return $result;
     }

   }
