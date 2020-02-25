<?php

    class AdminRepository
    {        
        private $connection;
        
        public function __construct()
        {
            $this->connection = new PDO(
                'mysql:host=localhost;dbname=ellestmanuelle', 
                'root',
                null
            );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
        }

        public function getCreation() {
            $sql = "SELECT * FROM creation c";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Creation');            

            return $stmt->fetchAll();
        }
    }

?>