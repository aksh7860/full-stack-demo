<?php
#ini_set('display_errors', 1); 
#ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "users";
  
    // object properties
    public $name;
    public $email;
    public $contact_no;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create product
    function create(){
      
        // query to insert record
        try {
             $query = "INSERT INTO " . $this->table_name . " SET name=:name, contact_no=:contact_no, email=:email";
      
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
          
            // bind values
            $stmt->bindParam(":name", $this->name);
            
            $stmt->bindParam(":email", $this->email);
           
            $stmt->bindParam(":contact_no", $this->contact_no);
                 // execute quer
            $stmt->execute();
        
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>".$e->getMessage();
            return false;
        }
        return true;
          
    }

    function read(){
      
        // select all query
        try {
            $query = "SELECT user_id,email,name,contact_no from users";
      
        // prepare query statement
            $stmt = $this->conn->prepare($query);
          
            // execute query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>".$e->getMessage();
        }
      
        return $stmt;
    }
}
?>