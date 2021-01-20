<?php
include ('config.php');

if (!empty($_GET['search'])) {
	// пользовательский текст из формы
	$search = $_GET['search'];
	
	$fields=['name'=>'name', 'email'=>'email', 'phone'=>'phone', 'address'=>'address'];
	$field='name';
	if(array_key_exists($_GET['where'],$fields)){
		$field=$fields[$_GET['where']];	
	}
	$sql="SELECT * FROM koolitus WHERE {$field} LIKE '%{$search}%'";
	
	$output = mysqli_query($connection, $sql);
	// количество ответов на запрос
	$results = mysqli_num_rows ($output);
	
	echo 'Поиск по ключевому слову: '.$search.'<br>';
	echo 'Ответ: <br>';
	//количество найденых ответов
	if ($results == 0) {
		echo "0 ответов найдено!";
	} 
	else {
		echo 'Найдено - '.$results.' ответов'.'<br>';
	}
	//отображение на странице
	while($line = mysqli_fetch_assoc($output)){
		echo '<div style="border: 1px solid;"> <p>'.$line['name'].'</p> <p>'.$line['email'].'</p> <p>'.$line['phone'].'</p> <p>'.$line['address'].'</p> </div>';
	}
	mysqli_free_result($output);
	mysqli_close($connection);	
}
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

<title>Поиск</title>
</head>
<body>
<div class="container-fluid">
<form method="get" action="">
	<div class="col-md-6 mt-3">
	<select class="form-select" id="select" name="where">
		<option>name</option>
		<option>email</option>
		<option>phone</option>
		<option>address</option>
	</select>
	</div>
	</br>
	Поиск <input type="text" name="search">
	<input type="submit" value="search...">
</form>
</div>
</body>
</html>