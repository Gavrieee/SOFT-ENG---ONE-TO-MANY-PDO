<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertWebDevBtn'])) {

	$query = insertWebDev($pdo, $_POST['fullname'], $_POST['section'], 
		$_POST['registration_date']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editWebDevBtn'])) {
	$query = updateWebDev($pdo, $_POST['fullname'], $_POST['section'], 
	$_POST['registration_date'], $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteWebDevBtn'])) {
	$query = deleteWebDev($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewProjectBtn'])) {
	$query = insertProject($pdo, $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['publication_year'], $_GET['student_id']);

	if ($query) {
		header("Location: ../viewprojects.php?student_id=" .$_GET['student_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editProjectBtn'])) {
	$query = updateProject($pdo, $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['publication_year'], $_GET['book_id']);

	if ($query) {
		header("Location: ../viewprojects.php?student_id=" .$_GET['student_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteProjectBtn'])) {
	$query = deleteProject($pdo, $_GET['book_id']);

	if ($query) {
		header("Location: ../viewprojects.php?student_id=" .$_GET['student_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>



