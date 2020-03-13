<?php 
	include_once('../dal/AdminRepository.php');
	$repo = new AdminRepository();

	if (isset($_REQUEST['delId']) && $_REQUEST['delId'] != "")
	{
		$creation = $repo->getAllRecords('creation', '*', ' AND id="'.$_REQUEST['delId'].'"')[0];
		unlink(Config::$UPLOADFOLDER . $creation["picture"]);
		unlink(Config::$UPLOADFOLDER . $creation["picture2"]);

		$repo->delete('tag', array('id_creation' => $_REQUEST['delId']));
		$repo->delete('creation', array('id' => $_REQUEST['delId']));
		header('location: index.php?msg=rds');
		exit;
	}
?>