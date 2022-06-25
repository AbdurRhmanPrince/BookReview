<?php


require_once("db_config.php");

 
    class Database {
        private $connection;

        public function __construct()
        {
             $this->db_con();
        }

    public function db_con()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    public function run_query($sql)
    {

        $result = $this->connection->query($sql);
        return $this->confirm_query($result);
    }

    public function confirm_query($result)
    {
        if (!$result) {
            die($result);
        }

        return $result;
    }

    public function escape_string($data) {
        $data = $this->connection->real_escape_string($data);
        $data = htmlentities($data);
        
        return $data;
    }



    }



    $database = new Database();

?>