<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
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
	<a href="index.php" style="margin: 0px 10px 0px 10px">Back?</a>
	<div class="inputMain">
		<?php $getWebDevByID = getWebDevByID($pdo, $_GET['student_id']); ?>
		<h1>Edit Student Information</h1>
		<form action="core/handleForms.php?student_id=<?php echo $_GET['student_id']; ?>" method="POST">
			<div class="inputEditInner">
				<p>
					<label for="name">Student Name</label> 
					<input type="text" name="fullname" value="<?php echo $getWebDevByID['fullname']; ?>" required>
				</p>
				<p>
					<label for="name">Section</label> 
					<input type="text" name="section" value="<?php echo $getWebDevByID['section']; ?>" pattern="[A-Za-z]{4} \d-\d" title="e.g., UCOS 3-2" required>
				</p>
				<p>
					<label for="name">Registration Date</label> 
					<input type="date" name="registration_date" value="<?php echo $getWebDevByID['registration_date']; ?>" required>
				</p>
				
			</div>
		<p>
			<input type="submit" name="editWebDevBtn">
		</p>	
		</form>
	</div>
</body>
</html>
