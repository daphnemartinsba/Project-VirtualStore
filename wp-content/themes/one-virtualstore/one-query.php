<?php
    require_once ('one-connection.php');

    class OneQuery{
        private $result;
        private $conn;
        private $getting;
        private $database;

        
        
        public function __construct(){
            $this->database = new OneConnection();
            $this->conn = $this->database->connect();
            $this->getting = $this->database->getConnection();
        }

        public function insert($first_name, $last_name, $email, $message){
            $query = "INSERT INTO one_form (nome, sobrenome, email, mensagem) VALUES ('$first_name', '$last_name', '$email', '$message')";
            //$query = "SELECT * FROM one_form";
            $this->result = mysqli_query($this->getting, $query);
            
            if (!$this->result){
                echo "Error executing query: "   . mysqli_error($this->conn);
            }
            mysqli_close($this->conn);

        }
        
        
        public function consult(){
            $query = "SELECT * FROM one_form";
            $this->result = mysqli_query($this->getting, $query);
            
            // Print database result in rows
            if ($this->result) {
                while ($row = mysqli_fetch_assoc($this->result)) {
                    echo "Post ID: " . $row['id'] . ", Title: " . $row['mensagem'] . "<br>";
                }
                // Free the result set
                mysqli_free_result($this->result);
            } else {
                // Print MySQL error
                echo "Error executing query: "   . mysqli_error($this->conn);
            }
            mysqli_close($this->conn);
            return $this->result;
        }
        
            
        
    }
?>