<?php 
	include_once('../dal/AdminRepository.php');
	$repo = new AdminRepository();

	if (isset($_REQUEST['delId']) && $_REQUEST['delId'] != "")
	{
		$picture = $repo->getAllRecords('picture', '*', ' AND id="'.$_REQUEST['delId'].'"')[0];
		unlink(Config::$UPLOADFOLDER . $picture["name"]);

		$repo->delete('picture', array('id' => $_REQUEST['delId']));
		header('location: index.php?msg=rds');
		exit;
	}
?>