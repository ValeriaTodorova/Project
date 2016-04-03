<?php
include_once('includes/header.php')
?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');

    echo "<h3>Insert new question </h3>";
	echo "<form action='create_ans.php' method='post'>";
	echo "<h3>Cetegories</h3>";
	echo "<select class='form-control' name='categories'>";
	$read_query = 	"SELECT * FROM categories 
					WHERE date_deleted IS NULL ";
	$read_result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($read_result) > 0) {
			while($row = mysqli_fetch_assoc($read_result)){	
	echo "<option  value=".$row['id_category'].">".$row['name_of_category']."</option>";	
	}}			
	echo "</select>";
	echo "<p><input type='submit' name='submit' value='insert' class='btn btn-default'></p>";
	echo "</form>";
?>
<?php
include_once('includes/footer.php')
?>