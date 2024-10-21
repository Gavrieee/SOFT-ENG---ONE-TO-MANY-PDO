<?php  

function insertWebDev($pdo, $fullname, $section, $registration_date) {

	$sql = "INSERT INTO students (fullname, section, registration_date) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$fullname, $section, $registration_date]);
	
	if ($executeQuery) {
		return true;
	}
}



function updateWebDev($pdo, $fullname, $section, $registration_date, $student_id) {

	$sql = "UPDATE students
				SET fullname = ?,
					section = ?,
					registration_date = ?
				WHERE student_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$fullname, $section, $registration_date, $student_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteWebDev($pdo, $student_id) {
	$deleteWebDevProj = "DELETE FROM books WHERE student_id = ?";
	$deleteStmt = $pdo->prepare($deleteWebDevProj);
	$executeDeleteQuery = $deleteStmt->execute([$student_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM students WHERE student_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$student_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllWebDevs($pdo) {
	$sql = "SELECT * FROM students";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getWebDevByID($pdo, $student_id) {
	$sql = "SELECT * FROM students WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getProjectsByWebDev($pdo, $student_id) {
	
	$sql = "SELECT 
				books.book_id AS book_id,
				books.title AS title,
				books.author AS author,
				books.genre AS genre,
				books.publication_year AS publication_year
			FROM books
			JOIN students ON books.student_id = students.student_id
			WHERE books.student_id = ? 
			GROUP BY books.title;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertProject($pdo, $title, $author, $genre, $publication_year, $student_id) {
	$sql = "INSERT INTO books (title, author, genre, publication_year, student_id) VALUES (?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$title, $author, $genre, $publication_year,$student_id]);
	if ($executeQuery) {
		return true;
	}

}

function getProjectByID($pdo, $book_id) {
	$sql = "SELECT 
				books.book_id AS book_id,
				books.title AS title,
				books.author AS author,
				books.genre AS genre,
				books.publication_year AS publication_year
			FROM books
			JOIN students ON books.student_id = students.student_id
			WHERE books.book_id  = ? 
			GROUP BY books.title";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$book_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateProject($pdo, $title, $author, $genre, $publication_year, $book_id) {
	$sql = "UPDATE books
			SET title = ?,
				author = ?,
				genre = ?,
				publication_year  = ?
			WHERE book_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$title, $author, $genre, $publication_year, $book_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProject($pdo, $book_id) {
	$sql = "DELETE FROM books WHERE book_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$book_id]);
	if ($executeQuery) {
		return true;
	}
}

function getAllInfoByWebDevID($pdo, $student_id) {
	$sql = "SELECT * FROM students WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$student_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


?>