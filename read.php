<?php
include ('config.php');
if(empty($_GET['id'])){
	die ('Цель не была выбрана!');
} else {
	$id = $_GET['id'];
//запрос
	$checkSQL=mysqli_query($connection, "SELECT id, title, news FROM `news` WHERE id='$id'");
	$sql = "SELECT * FROM news WHERE id='$id'";
	$output  = mysqli_query($connection, $sql);
	$str = mysqli_fetch_assoc($output);	
}		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Чтение новостей</title>
</head>
<body>
<h1>Просмотр новостей</h1>
<?php
	while($str= mysqli_fetch_array($checkSQL))
	{	
	echo'<div>
		<p>'.$str['title'].'</p>
		<p>'.$str['news'].'</p>
		</div>';
	}
?>
<a href="news.php"> назад </a>

</body>
</html>