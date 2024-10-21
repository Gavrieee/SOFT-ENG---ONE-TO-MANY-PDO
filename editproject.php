<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
		.inputEditInner {
			background-color: white;
			width: 20%;
  			margin: 0 auto;
			text-align: left;
		}
		input[type="text"], input[type="date"]{
			width: 100%; 
			box-sizing: border-box;			
		}
	</style>
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewprojects.php?student_id=<?php echo $_GET['student_id']; ?> " style="margin: 0px 10px 0px 10px">
	Back?</a>
	<div class="inputMain">
		<h1>Edit Mode</h1>
		<?php $getProjectByID = getProjectByID($pdo, $_GET['book_id']); ?>
		<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?> &student_id=<?php echo $_GET['student_id']; ?>" method="POST">
			<div class="inputEditInner">
				<p>
					<label for="name">Book Title</label> 
					<input type="text" name="title" 
					value="<?php echo $getProjectByID['title']; ?>">
				</p>
				<p>
					<label for="name">Author</label> 
					<input type="text" name="author" 
					value="<?php echo $getProjectByID['author']; ?>">
				</p>
				<p>
					<label for="name">Genre</label> 
					<input type="text" name="genre" 
					value="<?php echo $getProjectByID['genre']; ?>">
				</p>
				<p>
					<label for="name">Publication Year</label> 
					<input type="text" name="publication_year" 
					value="<?php echo $getProjectByID['publication_year']; ?>">
				</p>
			</div>
			<p>
				<input type="submit" name="editProjectBtn" style="text-align: center;">
			</p>
	</form>
	</div>
	
</body>
</html>
