<?php

namespace Controllers
{   
    class CreationController
    {
        private $repository;
		private $productCount = 0;
		private $currentPage = 0;
		private $productPerPage = 12;

		private $searchString = "";
		private $currentTechniqueId = 0;
		private $currentThemeId = 0;

        public function __construct($repository)
        {
            $this->repository = $repository;
			$this->productCount = $this->getProductCount();	
        }

        public function index()
        {       
			if(isset($_GET['search']))
			{
				$this->setFilter($_GET['search'], 0, 0);
			}
			if(isset($_GET['theme']) && is_numeric($_GET['theme']))
			{
				$this->setFilter("", 0, $_GET['theme']);
			}
			if(isset($_GET['technique']) && is_numeric($_GET['technique']))
			{
				$this->setFilter("", $_GET['technique'], 0);
			}
			if(isset($_GET['previouspage']))
			{
				$this->currentPage--;
			}
			if(isset($_GET['page']) && is_numeric($_GET['page']))
			{
				$this->currentPage = $_GET['page'];
			}
			if(isset($_GET['nextpage']))
			{
				$this->currentPage++;
			}

			$techniques = $this->repository->getTechnique();
			$themes = $this->repository->getTheme();
			$products = $this->repository->getCreation($this->searchString, $this->currentTechniqueId, $this->currentThemeId, $this->currentPage * $this->productPerPage, $this->productPerPage);
			
			$firstCount = $this->currentPage * $this->productPerPage + 1;
			$lastCount = ($this->currentPage + 1) * $this->productPerPage;
			if($lastCount > $this->productCount)
				$lastCount = $this->productCount;
			$pageCount = $this->productCount / $this->productPerPage;

			$data = [
                'searchString' => $this->searchString,
                'currentTechniqueId' => $this->currentTechniqueId,
                'currentThemeId' => $this->currentThemeId,
                'techniques' => $techniques,
                'themes' => $themes,
				'products' => $products,
				'firstCount' => $firstCount,
				'lastCount' => $lastCount,
				'productCount' => $this->productCount,
				'pageCount' => $pageCount
            ];
			
            return ['view', 'creations-personnelles', $data];
        }

		private function setFilter($searchString, $currentTechniqueId, $currentThemeId)
		{
			$this->searchString = $searchString;
			$this->currentTechniqueId = $currentTechniqueId;
			$this->currentThemeId = $currentThemeId;

			$this->currentPage = 0;
			$this->productCount = $this->getProductCount();	
		}

		private function getProductCount()
		{
			return $this->repository->getCreationCount($this->searchString, $this->currentTechniqueId, $this->currentThemeId);
		}
	}
}

?>