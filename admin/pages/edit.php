<?php 
	include_once('../dal/AdminRepository.php');
	include_once('../dal/FileUploader.php');
	$repo = new AdminRepository();

	if(isset($_REQUEST['editId']) && $_REQUEST['editId'] != "")
	{
		$page = $repo->getAllRecords('page', '*', ' AND id="'.$_REQUEST['editId'].'"')[0];
	}

	if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "")
	{
		extract($_REQUEST);
		if ($content == "")
		{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=uc&editId='.$_REQUEST['editId']);
			exit;
		}

		$data = array(
			'content'=>$content
		);
		
		$repo->update('page', $data, array('id' => $editId));

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
	<link rel="stylesheet" href="codemirror/css/codemirror.css">
	<link rel="stylesheet" href="codemirror/theme/darcula.css">
	
	<style>
		#preview, .CodeMirror {
			width: 100%;
			height : 600px;
		}
	</style>

    <title>Ellestmanuelle | Administration créations</title>
  </head>
  <body>
   	<div class="">
		<?php
			if (isset($_REQUEST['msg']) && $_REQUEST['msg'] == "uc")
			{
				echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Content is mandatory field!</div>';
			}
		?>
		<div class="card">
			<div class="card-header">
				<i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Page</strong> 
				<a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-arrow-circle-left"></i> Browse Pages</a>
			</div>
			<div class="card-body">
				<div class="col-12">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" id="name" class="form-control" value="<?php echo $page['name']; ?>" required disabled>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
								<label>Content <span class="text-danger">*</span></label>
								<textarea name="content" id="content" class="form-control" required><?php echo $page['content']; ?></textarea>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Preview <span class="text-danger">*</span></label>
									<br/>
									<iframe src="" id="preview"></iframe>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Page</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="codemirror/js/codemirror.js"></script>
	<script src="codemirror/mode/xml/xml.js"></script> 
	<script src="codemirror/mode/javascript/javascript.js"></script>
	<script src="codemirror/mode/css/css.js"></script>
	<script src="codemirror/mode/htmlmixed/htmlmixed.js"></script>
	<script>
		function updatePreview(content) {
        	var previewFrame = document.getElementById('preview')
        	var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document
        	preview.open()
        	preview.write(content)
        	preview.close()
		}
		  
		var cm = CodeMirror.fromTextArea(document.getElementById('content'), {
			lineNumbers: true,
			lineWrapping: true,
			mode: "htmlmixed",
			theme: "darcula"
		}).on("change", function(cm, change) {
			updatePreview(cm.getValue())
		})

		updatePreview(document.getElementById('content').value)
	</script>
</body>
</html>