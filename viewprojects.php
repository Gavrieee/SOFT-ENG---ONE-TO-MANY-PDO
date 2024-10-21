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
		table, th, td {
			color: black;
		}
		.inputMain {
			background-color: white;
			text-align: center; 
			margin: 75px 10px 75px 10px;
			padding: 5px;
			border: 10px black;
		}
		.inputInner {
			background-color: white;
			width: 20%;
  			margin: 0 auto;
			text-align: left;
		}
		input[type="text"], input[type="number"]{
			width: 100%; 
			box-sizing: border-box;
			
		}
		table, th, td, tr {
			border-bottom: 0.5px solid black;
			border-collapse: collapse;
			table-layout:fixed;
			width: 100%;
			height: 150%;	
			text-align: center;
		}
		.bookInfoTable {
			background-color: white;
			margin: 0px 50px 50px 50px;
		}
		.bookTableInner {
			border-style: solid;
			
			padding: 25px 0px 25px 0px; /* Adjusted for space */
			border: 1px solid;
			box-shadow: 2px 2px;
			border-radius: 25px;
		}
	</style>
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php" style="margin: 0px 10px 0px 10px">Back?</a>
	<div class="inputMain">
		<div class="inputInner">
			<?php $getAllInfoByWebDevID = getAllInfoByWebDevID($pdo, $_GET['student_id']); ?>
			<h1 style="text-align: center;">Student's Rented Book</h1>
			<h3>Name: <?php echo $getAllInfoByWebDevID['fullname']; ?></h3>
		
			<form action="core/handleForms.php?student_id=<?php echo $_GET['student_id']; ?>" method="POST">
			<p>
				<label for="firstName">Book Title</label> 
				<input type="text" name="title" required>
			</p>
			<p>
				<label for="firstName">Author</label> 
				<input type="text" name="author" required>
			</p>
			<p>
				<label for="firstName">Genre</label> 
				<input type="text" name="genre" required>
			</p>
			<p>
				<label for="firstName">Publication Year</label> 
				<input type="number" name="publication_year" min="1900" max="2024" step="1"required>
			</p>
		</div>
			<p>
				<input type="submit" name="insertNewProjectBtn">
			</p>
		</form>	
	</div>
	<hr style="width: 90%;">
	<h1 style="text-align: center; margin: 50px 0px 20px 0px;">Book Information</h1>
	<div class="bookInfoTable">
		<div class="bookTableInner">
			<table style="width: 100%; margin: 0px 0px 0px 0px;">
			<tr>
				<th>Book ID</th>
				<th>Title</th>
				<th>Author</th>
				<th>Genre</th>
				<th>Publication Year</th>
				<th>Action</th>
			</tr>
			<?php $getProjectsByWebDev = getProjectsByWebDev($pdo, $_GET['student_id']); ?>
			<?php foreach ($getProjectsByWebDev as $row) { ?>
			<tr>
				<td><?php echo $row['book_id']; ?></td>	  	
				<td><?php echo $row['title']; ?></td>	  	
				<td><?php echo $row['author']; ?></td>	  	
				<td><?php echo $row['genre']; ?></td>	  	
				<td><?php echo $row['publication_year']; ?></td>
				<td>
					<a href="editproject.php?book_id=<?php echo $row['book_id']; ?>&student_id=<?php echo $_GET['student_id']; ?>">Edit</a>

					<a href="deleteproject.php?book_id=<?php echo $row['book_id']; ?>&student_id=<?php echo $_GET['student_id']; ?>">Delete</a>
				</td>	  	
			</tr>
			<?php } ?>
		</table>
		</div>
		
	</div>

	

	
</body>
</html>