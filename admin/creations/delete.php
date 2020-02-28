<?php 
	include_once('../dal/AdminRepository.php');
	$repo = new AdminRepository();

	if (isset($_REQUEST['delId']) && $_REQUEST['delId'] != "") {
		$repo->delete('tag', array('id_creation' => $_REQUEST['delId']));
		$repo->delete('creation', array('id' => $_REQUEST['delId']));
		header('location: index.php?msg=rds');
		exit;
	}
?>