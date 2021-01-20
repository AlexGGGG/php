<?php
include ('config.php');

$checkSQL=mysqli_query($connection, "SELECT * FROM `koolitus`");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" 
 rel="stylesheet">	

<title>Запись на курсы</title>
</head>
  <body>
    
	<div class="container-fluid">
	<h1>Запись на курсы</h1>
	<div class="col-12">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Phone</th>
				<th scope="col">Address</th>
				<th scope="col">Email</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($str= mysqli_fetch_array($checkSQL))
			{	
				echo'<tr>
					  <th scope="row">'.$str['id'].'</th>
					  <td>'.$str['name'].'</td>
					  <td>'.$str['phone'].'</td>
					  <td>'.$str['address'].'</td>
					  <td>'.$str['email'].'</td>
					</tr>';
			}
		?>
		</tbody>		
	</table>
	
	</div>
	</div>
	

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>