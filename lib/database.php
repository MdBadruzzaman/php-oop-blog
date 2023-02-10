<?php

 // Database class

    class Database {
        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $database = "online_php_project";

        public $connection;
        public $error;
    

        public function __construct(){
            $this->ConnectBD();

        }

        private function ConnectBD () {
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->database);
    
            if(!$this->connection){
                $this->error = "Connection Failed: " . $this->connection->connect_error;
                return false;
            }
        }

        public function insert($data){
            $insert_data = $this->connection->query($data);

            if ($insert_data) {
                return $insert_data;
            }else{
                return false;
            }
        }

        public function update($data){
            $update_data = $this->connection->query($data);

            if ($update_data) {
                return $update_data;
            }else{
                return false;
            }
        }

        public function select($data){
            $select_data = $this->connection->query($data);

            if (!empty($select_data) && $select_data->num_rows > 0) {
                return $select_data;
            }else{
                return false;
            }
        }

        public function delete($id,$table){
            $sql_delete = "DELETE FROM $table WHERE id = $id";
            $data = $this->connection->query($sql_delete);

            if ($data) {
                return true;
            }else{
                echo "Error: Can't Delete". $id . "From Table" . $table;
                return false;
            }
        }

        public function verify ($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    }



       

 


?>