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
$read_query = 	"SELECT * FROM questions 
				WHERE date_deleted IS NULL";
$read_result = mysqli_query($conn, $read_query);
//or table
echo "<h3>Choose question to modify</h3>";
//echo "<ul class='new'>";
echo "<table>";
echo "<tr>";
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		

		echo "<td> ".$row['question']."</td>";
		//echo '<li class="new">'.$row['question'];
		//for U D purpose we need update and delete buttons/links
		//we also need $row['id_city'] to know exactly which row of the table to 
		//update or to delete
		echo '<td> '.'<a href="update_questions.php?id='.$row['id_question'].'" class="btn btn-warning btn-xs">Edit</a></td>';// kriene na id
		echo '<td> '.'<a href="delete_questions.php?id='.$row['id_question'].'" class="btn btn-danger btn-xs">Delete</a></td>';
		//echo '</li>';
		echo "</tr>";

		}
		
	}
	echo "</table>";

//echo "</ul>";
				echo "<p><a href='create_ans.php' class='btn btn-default'>Create answer</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Back to category</a></p>";

?>


<?php
include_once('includes/footer.php')
?>				