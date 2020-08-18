<?php
require 'config.php';
if($_POST){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$des = $_POST['des'];
	$sql = "UPDATE todo SET title='$title',description='$des' where id='$id'";
	echo $sql;
	$pdostatement = $pdo->prepare($sql);
	$result = $pdostatement->execute();
	if($result){
		echo "<script>alert('Todo item is updated.');window.location.href='index.php';</script>";
	}
	
}else{
	$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
	$pdostatement->execute();
	$result1 = $pdostatement->fetchAll();	
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
			<h2>Edit ToDo Item</h2>
			<form class="" action="" method="post">
				<input type="hidden" name="id" value="<?php echo $result1[0]['id'] ?>">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $result1[0]['title'] ?>" required>
				</div>
				<div class="form-group">
					<label for="">Description</label>
					<textarea name="des" class="form-control" rows="8" cols="50" ><?php echo $result1[0]['description'] ?></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="UPDATE">
					<a class="btn btn-default" href="index.php">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>