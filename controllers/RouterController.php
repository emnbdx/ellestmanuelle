<?php
    require_once("dal/Repository.php"); 

    class RouterController
    {
        private $repository;
        private $currentPage;
        
        public function __construct()
        {
            $this->repository = new Repository();
            
            $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $request = explode('/', $urlPath);
            $this->currentPage = end($request);
        }

        public function getTitle() 
        {
            $title = "Ellestmanuelle | ";
            switch ($this->currentPage)
            {
                case '' :
                case '/' :
                case 'index' :
                case 'index.php' :
                    $title .= "Acceuil";
                    break;
                case 'ateliers' :
                    $title .= "Ateliers";
                    break;
                case 'contact' :
                    $title .= "Contact";
                    break;
                case 'creations-personnelles' :
                    $title .= "Création Personnelles";
                    break;
                case 'illustrations' :
                    $title .= "Illustrations";
                    break;
                case 'qui-suis-je' :
                    $title .= "Qui suis-je ?";
                    break;
            }

            echo $title;
        }

        public function getContent()
        {
            switch ($this->currentPage)
            {
                case '' :
                case '/' :
                case 'index' :
                case 'index.php' :
                    echo $this->repository->getPageContent("home");
                    break;
                case 'ateliers' :
                    echo $this->repository->getPageContent("ateliers");
                    break;
                case 'contact' :
                    require_once("views/contact.php");
                    break;
                case 'creations-personnelles' :
                    require_once("views/creations-personnelles.php");
                    break;
                case 'illustrations' :
                    echo $this->repository->getPageContent("illustrations");
                    break;
                case 'qui-suis-je' :
                    echo $this->repository->getPageContent("qui-suis-je");
                    break;
            }
        }
    }
?>