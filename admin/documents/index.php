<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<title>Ellestmanuelle | Administration documents</title>
	</head>
	<body>
		<?php
			include_once('../dal/AdminRepository.php');
			$repo = new AdminRepository();			
			$documents = $repo->getAllRecords('document', '*', '', 'ORDER BY id DESC');
		?>
			<div class="container">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-fw fa-globe"></i><strong>Browse Documents</strong> 
					<a href="/admin/index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-arrow-circle-left"></i> Return to admin</a>
					<a href="add.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Document</a>
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
				</div>
			</div>

			<hr>
			
			<div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr class="bg-primary text-white">
							<th>Id</th>
							<th>Thumbnail</th>
							<th>Balise</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (count($documents) > 0)
						{
							foreach ($documents as $document)
							{
						?>
						<tr>
							<td><?php echo $document['id'];?></td>
							<?php 
							$file_parts = pathinfo($document['name']);
							if($file_parts['extension'] == "jpg" ||
								$file_parts['extension'] == "jpeg" ||
								$file_parts['extension'] == "png" ||
								$file_parts['extension'] == "gif")
							{
							?>
								<td>
									<img src="/images/uploads/<?php echo $document['name']; ?>" class="img-thumbnail" width="200px" />
								</td>
								<td><?php echo "&lt;img src=\"/images/uploads/" . $document['name'] . "\" /&gt;"; ?></td>
							<?php
							}
							else 
							{
							?>
								<td>
									<a href="/images/uploads/<?php echo $document['name']; ?>" target="_blank"><?php echo $document['name']; ?></a>
								</td>
								<td><?php echo "&lt;a href=\"/images/uploads/" . $document['name'] . "\" target=\"_blank\"&gt;" . $document['name'] . "&lt;/a&gt;"; ?></td>
							<?php
							}
							?>
							<td align="center">
								<a href="delete.php?delId=<?php echo $document['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this document?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
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
