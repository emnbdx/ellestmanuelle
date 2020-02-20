<?php

    class Repository
    {        
        public function __construct(PDO $connection = null)
        {
            $this->connection = $connection;
            if ($this->connection === null) {
                $this->connection = new PDO(
                        'mysql:host=localhost;dbname=ellestmanuelle', 
                        'ellestmanuelle', 
                        'lNI7fRtjiKZpwl1jg35yWPgwToMJx3TA7Vgboyga'
                    );
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION
                );
            }
        }

        public function getTheme() {
            $stmt = $this->connection->prepare('
                SELECT * FROM theme
            ');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Theme');

            return $stmt->fetchAll();
        } 

        public function getTechnique() {
            $stmt = $this->connection->prepare('
                SELECT * FROM technique
            ');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Technique');
            
            return $stmt->fetchAll();
        }

        public function getNbCreation($search, $themeId, $techniqueId) {

        }

        public function getCreation($search, $themeId, $techniqueId, $from, $count) {
                if ($result = $mysqli->query("SELECT * FROM creation OFFSET $from LIMIT $count")) {
                printf("Select a retourné %d lignes.\n", $result->num_rows);
            
                /* Libération du jeu de résultats */
                $result->close();
            }
        }
    }

?>