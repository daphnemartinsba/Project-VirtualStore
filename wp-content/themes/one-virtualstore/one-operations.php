<?php

include_once('one-query.php');


    class OneOperations{
        private $consult;

        public function __construct(){
            $this->consult = new OneQuery();
           
        }


        public function store(){
            if(isset($_POST['btn-send'])){
                $first_name = $_POST['nome'];
                $last_name = $_POST['sobrenome'];
                $email = $_POST['email'];
                $message = $_POST['mensagem'];

                $this->consult->insert($first_name, $last_name, $email, $message);

            }
        }
    } 

?>