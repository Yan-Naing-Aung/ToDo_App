<?php
require 'config.php';
if(isset($_POST['submit'])){
	$title= $_POST['title'];
	$des= $_POST['des'];

	$sql = "INSERT INTO todo (title,description) VALUES (:title,:descript)";
	$pdostatement = $pdo->prepare($sql);
	$result = $pdostatement->execute(
		array(
			':title'=>$title,
			':descript'=>$des
		)
	);
	
	if($result){
		echo "<script>alert('New item is added.');window.location.href='index.php';</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Create New ToDo</h2>
			<form class="" action="add.php" method="post">
				<div class="form-group">
					<label for="">Title</label>
					<input name="title" type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="">Description</label>
					<textarea name="des" class="form-control" rows="8" cols="50"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
					<a class="btn btn-default" href="index.php">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>