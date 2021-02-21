<?php

namespace Controllers
{   
    class StaticController
    {
        private $repository;

        public function __construct($repository)
        {
            $this->repository = $repository;
        }

        public function index()
        {
            $data = $this->repository->getPageContent("home");
            return ['raw', null, $data];
        }

        public function ateliers()
        {
            $data = $this->repository->getPageContent("ateliers");
            return ['raw', null, $data];
        }

        public function illustrations()
        {
            $data = $this->repository->getPageContent("illustrations");
            return ['raw', null, $data];
        }

        public function whoami()
        {
            $data = $this->repository->getPageContent("qui-suis-je");
            return ['raw', null, $data];
        }

        public function shop()
        {
            $data = $this->repository->getPageContent("boutique");
            return ['raw', null, $data];
        }
    }
}

?>