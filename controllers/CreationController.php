<?php

	include ("dal/Repository.php");
	include ("models/CreationModel.php");
	include ("models/TechniqueModel.php");
	include ("models/ThemeModel.php");

    class CreationController
    {
		private $repository;
		private $productCount = 0;
		private $currentPage = 0;
		private $productPerPage = 12;

		private $searchString = "";
		private $currentTechniqueId = 0;
		private $currentThemeId = 0;

		// GET / SET
		public function getSearchString()
		{
			return $this->searchString;
		}

		public function __construct()
        {
			$this->repository = new Repository();
			$this->productCount = $this->getProductCount();	
		}

		// Search Helpers
		public function setFilter($searchString, $currentTechniqueId, $currentThemeId)
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

		// Pagination
		public function getPreviousPage()
		{
			$this->currentPage--;
		}
		
		public function getNextPage()
		{
			$this->currentPage++;
		}
		
		public function getPage($page)
		{
			$this->currentPage = $page;
		}
		
		public function buildPager()
		{
			$pageCount = $this->productCount / $this->productPerPage;

			if($pageCount <= 1)
				return;
			
			echo "<div class=\"navigation pagination\">";
			echo "	<div class=\"page-numbers\">";

			//if($this->currentPage > 0)
			//{
			//	echo "		<a href=\"?previouspage\" class=\"page-numbers\">";
			//	echo "			<span><i class=\"zmdi zmdi-chevron-left\"></i></span>";
			//	echo "		</a>";
			//}
			
			for ($i=0; $i < $pageCount; $i++) { 
				echo "		<a href=\"?page=$i\" class=\"page-numbers" . ($i == $this->currentPage ? " current" : "") . "\">";
				echo "			<span>" . ($i + 1) . "</span>";
				echo "		</a>";
			}

			//if($this->currentPage < $pageCount - 1)
			//{
			//	echo "		<a href=\"?nextpage\" class=\"page-numbers\">";
			//	echo "			<span><i class=\"zmdi zmdi-chevron-right\"></i></span>";
			//	echo "		</a>";
			//}
			
			echo "	</div>";
			echo "</div>";
		}

		// HTML Helpers
		public function buildThemeList()
		{
			$themes = $this->repository->getTheme();

			echo "<ul class=\"product-categories\">";
			foreach($themes as $theme)
			{
				echo "<li class=\"cat-item cat-parent" . ($theme->id == $this->currentThemeId ? " current" : "") . "\">";
				echo "<a href=\"?theme=" . $theme->id . "\"><span>" . $theme->name . "</span></a>";
				echo "<a href=\"?theme=" . $theme->id . "\"><span>(" . $theme->nb . ")</span></a>";
				echo "</li>";
			}
			echo "</ul>";
		}

		public function buildTechniqueList()
		{
			$techniques = $this->repository->getTechnique();
			$currentKind = "";

			echo "<ul class=\"product-categories\">";
			foreach($techniques as $technique)
			{
				if($technique->kind != $currentKind)
				{				
					$currentKind = $technique->kind;
					echo "<h5>$currentKind</h5>";
				}
				echo "<li class=\"cat-item cat-parent" . ($technique->id == $this->currentTechniqueId ? " current" : "") . "\">";
				echo "<a href=\"?technique=" . $technique->id  . "\"><span>" . $technique->name . "</span></a>";
				echo "<a href=\"?technique=" . $technique->id  . "\"><span>(" . $technique->nb . ")</span></a>";
				echo "</li>";
			}
			echo "</ul>";
		}

		public function buildProducCountInfo()
		{			
			$firstCount = $this->currentPage * $this->productPerPage + 1;
			$lastCount = ($this->currentPage + 1) * $this->productPerPage;
			if($lastCount > $this->productCount)
				$lastCount = $this->productCount;

			echo "Affichage des résultats $firstCount à $lastCount sur $this->productCount";		
		}

		public function buildProductList()
		{
			$products = $this->repository->getCreation($this->searchString, $this->currentTechniqueId, $this->currentThemeId, $this->currentPage * $this->productPerPage, $this->productPerPage);

			$firstRow = true;
			$index = 0;
			foreach($products as $product)
			{
				if($index % 3 === 0) {

					if($firstRow === false) {
						echo "</div>";
					}

					echo "<div class=\"row\">";
					$firstRow = false;
				}

				echo "<div class=\"col\">";
				echo "	<div class=\"product type-product\">";
				echo "		<div class=\"woocommerce-LoopProduct-link\">";
				echo "			<div class=\"product-image\">";
				echo "				<a href=\"#\" class=\"wp-post-image\">";
				echo "					<img class=\"image-cover\" src=\"images/hp-1-featured-1.jpg\" alt=\"product\">";
				echo "					<img class=\"image-secondary\" src=\"images/hp-1-featured-11.jpg\" alt=\"product\">";
				echo "				</a>";
				//echo "				<a href=\"#\" class=\"onsale\">SALE</a>";
				echo "				<div class=\"yith-wcwl-add-button show\">";
				//echo "						<a href=\"#\" class=\"add_to_wishlist\">";
				//echo "							<i class=\"zmdi zmdi-favorite-outline\"></i>";
				//echo "						</a>";
				echo "					</div>";
				//echo "					<div class=\"button add_to_cart_button\">";
				//echo "						<a href=\"#\">";
				//echo "							<img src=\"images/icons/shopping-cart-black-icon.png\" alt=\"cart\">";
				//echo "						</a>";
				//echo "					</div>";
				echo "				<h5 class=\"woocommerce-loop-product__title\"><a href=\"#\">" . $product->name . "</a></h5>";
				//echo "				<span class=\"price\">";
				//echo "					<del>";
				//echo "						<span class=\"woocommerce-Price-amount amount\">";
				//echo "							<span class=\"woocommerce-Price-currencySymbol\">$</span>";
				//echo "							35";
				//echo "						</span>";
				//echo "					</del>";
				//echo "					<ins>";
				//echo "						<span class=\"woocommerce-Price-amount amount\">";
				//echo "							<span class=\"woocommerce-Price-currencySymbol\">$</span>";
				//echo "							22";
				//echo "						</span>";
				//echo "					</ins>";
				//echo "				</span>";
				echo "			</div>";
				echo "		</div>";
				echo "	</div>";
				echo "</div>";

				$index++;
			}

			echo "</div>";
		}
	}

?>