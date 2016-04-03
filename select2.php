<?php
include_once('includes/header.php')
?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');


	$category = $_POST['categories'];
		//you can shorten var names - $insert_query - $q or smth else
	$select_query = 	"SELECT * FROM questions  WHERE `id_category`='$category'";
				

	echo "<form action='create_ans.php' method='post'>";
	echo "<h3>Въпроси</h3>";
	echo "<select class='form-control' name='question'>";
	$read_result = mysqli_query($conn, $select_query);
	if (mysqli_num_rows($read_result) > 0) {
			while($row = mysqli_fetch_assoc($read_result)){	
	echo "<option  value=".$row['id_question'].">".$row['question']."</option>";	
	}}			
	echo "</select>";
	echo "<p><input type='submit' name='enter' value='Въведи' class='btn btn-default'></p>";
	echo "</form>";
?>
<?php
include_once('includes/footer.php')
?>