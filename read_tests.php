<?php
//you can include the db connection code in separate file
//and include this file
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$read_query = 	"SELECT * FROM tests 
				WHERE date_deleted IS NULL";
$read_result = mysqli_query($conn, $read_query);
//or table
echo "<ul>";
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		echo '<li>'.$row['id_category'];
		//for U D purpose we need update and delete buttons/links
		//we also need $row['id_city'] to know exactly which row of the table to 
		//update or to delete
		echo ' '.'<a href="update.php?id='.$row['id_category'].'">Edit</a>';// kriene na id
		echo ' '.'<a href="delete.php?id='.$row['id_category'].'">Delete</a>';
		echo '</li>';
		}
	}
echo "</ul>";

				echo "<p><a href='crud_questions/create.php'>Create question</a></p>";
				echo "<p><a href='crud_answers/create.php'>Create answer</a></p>";