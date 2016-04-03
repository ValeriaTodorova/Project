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
echo "<h3>Промяна на въпрос</h3>";
//echo "<ul class='new'>";
echo "<table>";
echo "<tr>";
	if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){ 
		

		echo "<td> ".$row['question']."</td>";
		//echo '<li class="new">'.$row['question'];
		//for U D purpose we need update and delete buttons/links
		
		echo '<td> '.'<a href="update_questions.php?id='.$row['id_question'].'" class="btn btn-warning btn-xs">Редактирай</a></td>';// kriene na id
		echo '<td> '.'<a href="delete_questions.php?id='.$row['id_question'].'" class="btn btn-danger btn-xs">Изтрий</a></td>';
		//echo '</li>';
		echo "</tr>";

		}
		
	}
	echo "</table>";

//echo "</ul>";
				echo "<p><a href='select1.php' class='btn btn-default'>Създаване на отговор</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Назад към категориите</a></p>";

?>


<?php
include_once('includes/footer.php')
?>				