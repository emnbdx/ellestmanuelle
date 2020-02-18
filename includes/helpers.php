<?php 						
	function isCurrentPage($page)
	{
		$parts = explode("/", $_SERVER["REQUEST_URI"]);
		$currentUri = end($parts);
		if($currentUri === $page)
			echo " class=\"current\"";
	}
?>