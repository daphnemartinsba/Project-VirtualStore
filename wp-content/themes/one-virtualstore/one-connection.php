<?php

//require_once(ABSPATH . 'wp-config.php'); 
require_once('one-operations.php');

    class OneConnection{
        private $dbName = 'wordpress_db';
        private $connection;
        private $host = 'db:3306';
        private $username = 'wordpress_user';
        private $password = "senha123";


        public function connect(){
                $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);
                /*$this->connection = new SQLite3('wordpress_db');*/
                if (!$this->connection) {
                    die("Database connection failed: " . mysqli_connect_error());
                }
                return $this->connection;                
        }

        public function getConnection(){
            return $this->connection;
        }

        public function close(){
            mysqli_close($this->connection); 
        }

    }
?>