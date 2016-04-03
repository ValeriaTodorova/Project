<?php
include_once('includes/header.php')
?>

<?php
//you can include the db connection code in separate file
//and include this file
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
$read_query = 	"SELECT * FROM categories 
				WHERE date_deleted IS NULL";
$read_result = mysqli_query($conn, $read_query);
//or table
echo "<h3>Choose test to modify</h3>";
echo "<table>";
echo "<tr>";
//echo "<ul class='new'>";
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		echo "<td> ".$row['name_of_category']."</td>";

		//echo '<li class="new">'.$row['name_of_category'];
		//for U D purpose we need update and delete buttons/links
		//we also need $row['id_city'] to know exactly which row of the table to 
		//update or to delete
		echo ' <td>'.'<a href="update.php?id='.$row['id_category'].'" class="btn btn-warning btn-xs">Edit</a></td>';// kriene na id
		echo '<td> '.'<a href="delete.php?id='.$row['id_category'].'" class="btn btn-danger btn-xs">Delete</a></td>';
		//echo '</li>';
		echo "</tr>";

		}
	}
	echo "</table>";

//echo "</ul>";

				echo "<p><a href='create_questions.php' class='btn btn-default'>Create question</a></p>";
				echo "<p><a href='create_ans.php' class='btn btn-default'>Create answer</a></p>";
?>


<?php
include_once('includes/footer.php')
?>