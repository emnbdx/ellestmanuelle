<?php    
    require_once("config.php");
    require_once("models/CreationModel.php");
	require_once("models/TechniqueModel.php");
	require_once("models/ThemeModel.php");

    class Repository
    {        
        private $connection;
        
        public function __construct()
        {
            $this->connection = new PDO(
                "mysql:host=" . Config::$DBURL . ";dbname=" . Config::$DBNAME, 
                Config::$DBUSER,
                Config::$DBPASSWORD
            );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
        }

        public function getTheme()
        {
            $stmt = $this->connection->prepare('
                SELECT t.id, t.name, count(1) as nb
                FROM theme t 
                INNER JOIN tag ta on ta.id_theme = t.id
                GROUP BY t.id, t.name
            '); 
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Theme::class);

            return $stmt->fetchAll();
        } 

        public function getTechnique()
        {
            $stmt = $this->connection->prepare('
                SELECT t.id, t.name, t.kind, count(1) as nb
                FROM technique t
                INNER JOIN tag ta on ta.id_technique = t.id
                GROUP BY t.id, t.name, t.kind
                ORDER BY t.kind DESC
            ');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Technique::class);
            
            return $stmt->fetchAll();
        }

        public function getCreationCount($search, $techniqueId, $themeId)
        {
            $sql = "SELECT count(distinct t.id_creation) as nb from tag t";
            if($search !== "")
            {
                $sql .= " INNER JOIN creation c on c.id = t.id_creation and c.name like '%$search%'";
            }
            
            if($techniqueId !== 0)
            {
                $sql .= " WHERE t.id_technique = $techniqueId"; 
            }
                        
            if($themeId !== 0)
            {
                if(strpos($sql, "WHERE") === false)
                    $sql .= " WHERE t.id_theme = $themeId";
                else 
                    $sql .= " AND t.id_theme = $themeId";
            }
            
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetch()["nb"];
        }

        public function getCreation($search, $techniqueId, $themeId, $from, $count)
        {
            $sql = "SELECT c.* FROM creation c";
            if($search !== "")
            {
                $sql .= " WHERE c.name like '%$search%'";
            }
            
            if($techniqueId !== 0)
            {
                $sql .= " INNER JOIN tag t on t.id_creation = c.id";
                if(strpos($sql, "WHERE") === false)
                    $sql .= " WHERE t.id_technique = $techniqueId";
                else
                    $sql .= " AND t.id_technique = $techniqueId";
            }
                        
            if($themeId !== 0)
            {
                $sql .= " INNER JOIN tag t on t.id_creation = c.id";
                if(strpos($sql, "WHERE") === false)
                    $sql .= " WHERE t.id_theme = $themeId";
                else 
                    $sql .= " AND t.id_theme = $themeId";
            }

            $date = date('Hjn');
            $sql .= " ORDER BY RAND($date)";
            $sql .= " LIMIT $count OFFSET $from";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Creation::class);            

            return $stmt->fetchAll();
        }

        public function getPageContent($name)
        {
            $sql = "SELECT content FROM page where name = '$name'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetch()["content"];
        }
    }
?>