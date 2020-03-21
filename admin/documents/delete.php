<?php 
	include_once('../dal/AdminRepository.php');
	$repo = new AdminRepository();

	if (isset($_REQUEST['delId']) && $_REQUEST['delId'] != "")
	{
		$document = $repo->getAllRecords('document', '*', ' AND id="'.$_REQUEST['delId'].'"')[0];
		unlink(Config::$UPLOADFOLDER . $document["name"]);

		$repo->delete('document', array('id' => $_REQUEST['delId']));
		header('location: index.php?msg=rds');
		exit;
	}
?>