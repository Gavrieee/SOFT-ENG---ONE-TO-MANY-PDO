<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body{
			font-family: Arial, sans-serif;
		}
		.inputMain {
			background-color: white;
			text-align: center;
			margin: 100px 10px 100px 10px;
			
		}
		.container {
			border-style: solid;
			height: 100%;
			background-color: white;
			width: 75%;
  			margin: 0 auto;
			text-align: left;

			padding: 40px 30px 40px 30px;

			border: 1px solid red;

			box-shadow: 2px 2px red;
			border-radius: 25px;
		}
		.inputInner {
			padding: 0px 400px 0px 400px;
			background-color: white;
			text-align: left;
		}
	</style>
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewprojects.php?student_id=<?php echo $_GET['student_id']; ?> " style="margin: 0px 10px 0px 10px">Back?</a>
	<div class="inputMain">
		<h1>Delete this Book?</h1>
		<div class="inputInner">
			<?php $getProjectByID = getProjectByID($pdo, $_GET['book_id']); ?>
			<div class="container">
				<h3>Book Title: <?php echo $getProjectByID['title'] ?></h3>
				<h3>Author: <?php echo $getProjectByID['author'] ?></h3>
				<h3>Genre: <?php echo $getProjectByID['genre'] ?></h3>
				<h3>Publication Year: <?php echo $getProjectByID['publication_year'] ?></h3>
			</div>
			<div class="deleteBtn" style="margin: 20px; text-align: center;">
				<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&student_id=<?php echo $_GET['student_id']; ?>" method="POST">
				<input type="submit" name="deleteProjectBtn" value="Delete">
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
