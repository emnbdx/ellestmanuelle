<?php

    class theme
    {
        function __construct($p1, $p2)
        {
            $id = $p1;
            $name = $p2;
        }

        public $id;
        public $name;
    }

    class technique
    {
        function __construct($p1, $p2)
        {
            $id = $p1;
            $name = $p2;
        }

        public $id;
        public $name;
    }

    class creation
    {
        function __construct($p1, $p2, $p3, $p4, $p5)
        {
            $id = $p1;
            $name = $p2;
            $description = $p3;
            $picture = $p4;
            $picture2 = $p5;
        }

        public $id;
        public $name;
        public $description;
        public $picture;
        public $picture2;
    }
    
    $mysqli = new mysqli("localhost", "ellestmanuelle", "test", "ellestmanuelle");

    if ($mysqli->connect_errno) {
        printf("Échec de la connexion : %s\n", $mysqli->connect_error);
        exit();
    }

    function getTheme() {
        if ($result = $mysqli->query("SELECT * FROM theme")) {
            while ($row = $result->fetch_object()){
                $themes[] = new theme($row["id"], $row["name"]);
            }
        
            /* Libération du jeu de résultats */
            $result->close();
        }

        return $themes;
    } 

    function getTechnique() {
        if ($result = $mysqli->query("SELECT * FROM technique")) {
            while ($row = $result->fetch_object()){
                $techniques[] = new theme($row["id"], $row["name"]);
            }
        
            /* Libération du jeu de résultats */
            $result->close();
        }

        return $techniques;
    }

    function getNbCreation($search, $themeId, $techniqueId) {

    }

    function getCreation($search, $themeId, $techniqueId, $from, $count) {
            if ($result = $mysqli->query("SELECT * FROM creation OFFSET $from LIMIT $count")) {
            printf("Select a retourné %d lignes.\n", $result->num_rows);
        
            /* Libération du jeu de résultats */
            $result->close();
        }
    }

?>