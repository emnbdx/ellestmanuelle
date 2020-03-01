<?php 
	include_once('../dal/AdminRepository.php');
	include_once('../dal/FileUploader.php');
	$repo = new AdminRepository();
	if(isset($_REQUEST['editId']) && $_REQUEST['editId'] != "")
	{
		$creation = $repo->getAllRecords('creation', '*', ' AND id="'.$_REQUEST['editId'].'"')[0];
	}

	if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "")
	{
		extract($_REQUEST);
		if ($name == "")
		{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
			exit;
		}
		else if ($description == "")
		{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=ud&editId='.$_REQUEST['editId']);
			exit;
		}

		if ($_FILES["picture"]["name"] != "")
		{
			$fileUploader = new FileUploader($_FILES["picture"]);
			$fileUploader->upload();
		}

		if ($_FILES["picture2"]["name"] != "")
		{
			$fileUploader = new FileUploader($_FILES["picture2"]);
			$fileUploader->upload();			
		}

		$data = array(
			'name'=>$name,
			'description'=>$description,
			'picture'=>$_FILES["picture"]["name"] == "" ? $creation['picture'] : $_FILES["picture"]["name"],
			'picture2'=>$_FILES["picture2"]["name"] == "" ? $creation['picture2'] : $_FILES["picture2"]["name"],
		);
		
		$repo->delete('tag', array('id_creation' => $_REQUEST['editId']));
		$repo->update('creation', $data, array('id' => $editId));

		if ($theme != "")
		{
			$data = array(
				'id_creation'=>$editId,
				'id_theme'=>$theme,
			);
			$themeInsert = $repo->insert('tag', $data);
		}

		if ($technique != "")
		{
			$data = array(
				'id_creation'=>$editId,
				'id_technique'=>$technique,
			);
			$techniqueInsert = $repo->insert('tag', $data);
		}

		header('location: index.php?msg=rus');
		exit;
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Ellestmanuelle | Administration créations</title>
  </head>
  <body>
   	<div class="container">
		<?php
			if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "un")
			{
				echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Name is mandatory field!</div>';
			}
			else if (isset($_REQUEST['msg']) && $_REQUEST['msg'] == "ud")
			{
				echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Description is mandatory field!</div>';
			}
			else if (isset($_REQUEST['msg']) && $_REQUEST['msg'] == "up")
			{
				echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Picture is mandatory field!</div>';
			}
		?>
		<div class="card">
			<div class="card-header">
				<i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Creation</strong> 
				<a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-arrow-circle-left"></i> Browse Creations</a>
			</div>
			<div class="card-body">				
				<div class="col-sm-6">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Name <span class="text-danger">*</span></label>
							<input type="text" name="name" id="name" class="form-control" value="<?php echo $creation['name']; ?>" required>
						</div>
						<div class="form-group">
							<label>Description <span class="text-danger">*</span></label>
							<input type="text" name="description" id="description" class="form-control" value="<?php echo $creation['description']; ?>" required>
						</div>
						<div class="form-group">
							<label>Picture <span class="text-danger">*</span></label>
							<br/>
							<i>For best display 750px * 1030px</i>
							<?php 
								if ($creation['picture'] != "")
								{
							?>
								<br/>
								<img src="../../images/uploads/<?php echo $creation['picture']; ?>" class="img-thumbnail" />
							<?php
								} 
							?>
							<input type="file" class="tel form-control" name="picture" id="picture" value="<?php echo $creation['picture']; ?>">						
						</div>
						<div class="form-group">
							<label>Picture 2</label>
							<br/>
							<i>For best display 750px * 1030px</i>
							<?php 
								if ($creation['picture2'] != "")
								{
							?>
								<br/>
								<img src="../../images/uploads/<?php echo $creation['picture2']; ?>" class="img-thumbnail" />
							<?php
								} 
							?>
							<input type="file" class="tel form-control" name="picture2" id="picture2" value="<?php echo $creation['picture2']; ?>">
						</div>
						<div class="form-group">
							<label>Theme</label>
							<select id="theme" name="theme">
								<option></option>
								<?php 
									$themes = $repo->getAllRecords('theme', '*', '', 'ORDER BY name');
									$currentTheme = $repo->getAllRecords('tag', '*', ' AND id_theme is not null AND id_creation="'.$_REQUEST['editId'].'"');
									foreach ($themes as $theme)
									{
								?>
									<option value="<?php echo $theme["id"]?>"<?php echo count($currentTheme) > 0 && $currentTheme[0]['id_theme'] == $theme["id"] ? "selected" : ""?>><?php echo $theme["name"]?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Technique</label>
							<select id="technique" name="technique">
								<option></option>
								<?php 
									$techniques = $repo->getAllRecords('technique', '*', '', 'ORDER BY name');
									$currentTechnique = $repo->getAllRecords('tag', '*', ' AND id_technique is not null AND id_creation="'.$_REQUEST['editId'].'"');
									foreach ($techniques as $technique)
									{
								?>
									<option value="<?php echo $technique["id"]?>"<?php echo count($currentTechnique) > 0 && $currentTechnique[0]['id_technique'] == $technique["id"] ? "selected" : ""?>><?php echo $technique["name"]?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Creation</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>