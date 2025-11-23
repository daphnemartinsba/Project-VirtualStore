<?php

require_once(ABSPATH . 'wp-config.php'); 

    class Database{
        private $dbName = 'wordpress_db';
        private $connection;

        private $host = 'db:3306';
        private $username = 'wordpress_user';
        private $password = "senha123";

        public function connect(){
                $this->connection = mysqli_connect($host, $username, $password, $dbName);
                /*$this->connection = new SQLite3('wordpress_db');*/
                if (!$connection) {
                    die("Database connection failed: " . mysqli_connect_error());
                }
                return $this->connection;                
        }
    }
?>