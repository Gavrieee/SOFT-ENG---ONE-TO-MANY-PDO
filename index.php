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
		.inputForm {
			background-color: white;
			text-align: center; 
			margin: 100px 10px 100px 10px;
			padding: 5px;
			border: 10px black;
		}
		.studentForms {
			margin: 10px 50px 50px 50px;
			
			border: 10px black;
			background-color: white;
			display: flex;
			border-radius: 35px;
			border-style: outset;

			border: 1px solid;
			padding: 10px;
			box-shadow: 3px 3px;
			
			flex-wrap: wrap;
			display: flex;
			
			justify-content: center; /* Items are added from the top */
			align-items: center;
			
			overflow-x: auto; /* Allows scrolling if more items are added */
		}
		.container {
			border-style: solid;
			width: 200px;
			height: 200px; /* Sets the fixed height */
			margin: 20px;
			padding: 10px; /* Adjusted for space */
			border: 1px solid;
			box-shadow: 2px 2px;
			border-radius: 25px;
		}
		.inputInner {
			background-color: white;
			width: 20%;
  			margin: 0 auto;
			text-align: left;
		}
		input[type="text"], input[type="date"]{
			width: 100%; 
			box-sizing: border-box;	
			text-align: left;		
		}
	</style>
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="inputForm">
		<h1>Library Rental System</h1>
		<p>Enter a student's credentials below.</p>
	<form action="core/handleForms.php" method="POST">
		<div class="inputInner">
			<p>
				<label for="fullname">Name</label> 
				<input type="text" name="fullname" required>
			</p>
			<p>
				<label for="fullname">Section</label> 
				<input type="text" name="section" pattern="[A-Za-z]{4} \d-\d" title="e.g., UCOS 3-2" required>
				</select>
			</p>
			<p>
				<label for="fullname">Registration Date</label> 
				<input type="date" name="registration_date" required>
			</p>
		</div>
		
		<p>
			<input type="submit" name="insertWebDevBtn">
		</p>
	</form>
	</div>
	<hr style="width: 90%;">
	<h1 style="text-align: center; margin-top: 50px;">Student Records</h1>
	<div class="studentForms">
		
		<?php $getAllWebDevs = getAllWebDevs($pdo); ?>
		<?php foreach ($getAllWebDevs as $row) { ?>
			<div class="container">
				<p><b>Name:</b> <?php echo $row['fullname']; ?></p>
				<p><b>Section:</b> <?php echo $row['section']; ?></p>
				<p><b>Registration Date:</b> <?php echo $row['registration_date']; ?></p>
				<div class="editAndDelete" style="float: center; margin: 0px 20px 0px 20px;">
					<div style="text-align: center;">
						<a href="viewprojects.php?student_id=<?php echo $row['student_id']; ?>" >View Records</a>
					</div>
					<p>
						<hr>
						<div style="display: flex;">
							<div style="flex: 1; padding: 0px 10px 10px 10px; text-align: left;">
								<a href="editwebdev.php?student_id=<?php echo $row['student_id']; ?>">Edit</a>
							</div>
							<div style="flex: 1; padding: 0px 10px 10px 10px; text-align: right;">
								<a href="deletewebdev.php?student_id=<?php echo $row['student_id']; ?>">Delete</a>
							</div>
						</div>
					</p>
					
				</div>
			</div> 
		<?php } ?>
	</div>
	
</body>
</html>