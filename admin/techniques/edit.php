<?php 
	include_once('../dal/AdminRepository.php');
	include_once('../dal/FileUploader.php');
	$repo = new AdminRepository();
	if(isset($_REQUEST['editId']) && $_REQUEST['editId'] != "")
	{
		$technique = $repo->getAllRecords('technique', '*', ' AND id="'.$_REQUEST['editId'].'"')[0];
	}

	if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "")
	{
		extract($_REQUEST);
		if ($name == "")
		{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
			exit;
		}
		else if ($kind == "")
		{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=uk&editId='.$_REQUEST['editId']);
			exit;
		}

		$data = array(
			'name'=>$name,
			'kind'=>$kind,
		);
		
		$repo->update('technique', $data, array('id' => $editId));

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
    <title>Ellestmanuelle | Administration techniques</title>
  </head>
  <body>
   	<div class="container">
		<?php
			if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "un")
			{
				echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Name is mandatory field!</div>';
			}
			else if (isset($_REQUEST['msg']) && $_REQUEST['msg'] == "uk")
			{
				echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Kind is mandatory field!</div>';
			}
		?>
		<div class="card">
			<div class="card-header">
				<i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Technique</strong> 
				<a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-arrow-circle-left"></i> Browse Techniques</a>
			</div>
			<div class="card-body">				
				<div class="col-12">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Name <span class="text-danger">*</span></label>
							<input type="text" name="name" id="name" class="form-control" value="<?php echo $technique['name']; ?>" required>
						</div>
						<div class="form-group">
							<label>Type <span class="text-danger">*</span></label>
							<input type="text" name="kind" id="kind" class="form-control" value="<?php echo $technique['kind']; ?>" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Technique</button>
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