<?php
include('config.php'); 

if (is_array($_FILES) && array_key_exists('f', $_FILES)
	&& $_FILES['f']['error'] == 0) {
	$fileInfo = $_FILES['f'];
	if (move_uploaded_file($fileInfo['tmp_name'], 
	'uploaded/'.$fileInfo['name'])) {
		mysqli_query($connection, 
		"insert into images set name = '"
		.mysqli_real_escape_string($connection, 
		$fileInfo['name'])."'");
	}
}
?>
<html>
<head>
<title>Images</title>
<meta charset="utf-8">
<!--Bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 p-5 m-5 border">
			<form method="post"  enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
					<div>
						<label>Загрузить файл: </label>
					</div>
					<div>
						<input type="file" name="f">
					</div>
					<div class="mt-2">
						<input type="submit" value="Upload">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Загруженные картинки:</h1>
		</div>
		
		<?php
			$result = mysqli_query($connection, "select * from images order by id desc");
			foreach ($result as $img) {
			echo "<div class=\"col-md-3 pb-3\"><img class=\"img-fluid img-thumbnail\" src=\"uploaded/".$img['name']."\"></div>";
			}
		?>
		
	</div>

</div>
</body>
</html>