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
		<?php
			include_once('../dal/AdminRepository.php');
			$repo = new AdminRepository();
			$condition = '';
			if (isset($_REQUEST['name']) && $_REQUEST['name']!="")
			{
				$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
			}
			
			$creations = $repo->getAllRecords('creation', '*', $condition, 'ORDER BY id DESC');
		?>
			<div class="container">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-fw fa-globe"></i><strong>Browse Creations</strong> 
					<a href="../index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-arrow-circle-left"></i> Return to admin</a>
					<a href="add.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Creation</a>
				</div>
				<div class="card-body">
					<?php
						if (isset($_REQUEST['msg']) && $_REQUEST['msg']=="ras")
						{
							echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
						}
						else if (isset($_REQUEST['msg']) && $_REQUEST['msg']=="rds")
						{
								echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
						}
						else if (isset($_REQUEST['msg']) && $_REQUEST['msg']=="rus")
						{
							echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
						}
						else if (isset($_REQUEST['msg']) && $_REQUEST['msg']=="rna")
						{
							echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
						}
					?>
					<div class="col-sm-12">
						<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Creation</h5>
						<form method="get">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>" placeholder="Enter name">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label>&nbsp;</label>
										<div>
											<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<hr>
			
			<div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr class="bg-primary text-white">
							<th>Id</th>
							<th>Name</th>
							<th>Description</th>
							<th>Picture</th>
							<th>Picture2</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (count($creations) > 0)
						{
							foreach ($creations as $creation)
							{
						?>
						<tr>
							<td><?php echo $creation['id'];?></td>
							<td><?php echo $creation['name'];?></td>
							<td><?php echo $creation['description'];?></td>
							<td><?php echo $creation['picture'];?></td>
							<td><?php echo $creation['picture2'];?></td>
							<td align="center">
								<a href="edit.php?editId=<?php echo $creation['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
								<a href="delete.php?delId=<?php echo $creation['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this creation?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
							</td>

						</tr>
						<?php 
							}
						}
						else
						{
						?>
						<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
