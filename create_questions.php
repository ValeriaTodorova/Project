<?php
include_once('includes/header.php')
?>

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');


if(empty($_POST['submit'])){
	echo "<h3>Въведете въпрос</h3>";
	echo "<form action='create_questions.php' method='post'>";

	echo "<h5>Категории</h5>";
	echo "<p><select class='form-control' name='categories'></p>";
	$read_query = 	"SELECT * FROM categories 
					WHERE date_deleted IS NULL ";
	$read_result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($read_result) > 0) {
			while($row = mysqli_fetch_assoc($read_result)){	
	echo "<option  value=".$row['id_category'].">".$row['name_of_category']."</option>";	
	}}			
	echo "</select>";


	echo "<p><textarea class='form-control' rows='5' placeholder='Въведете въпрос' name='question' rows='9' cols='50' value='Въведете въпрос' ></textarea></p>";
	echo "<p><input type='submit' name='submit' value='Въведи'></p>";
	echo "</form>";
}
else{

	$question = $_POST['question'];
	$category = $_POST['categories'];
		
	$insert_query = 	"INSERT INTO questions (question,id_category) 
						VALUES ('$question','$category')";

	
			
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				
				echo "Успешно добавихте $question в базата данни!";
				echo "<p><a href='read_questions.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}

				echo "<p><a href='select1.php' class='btn btn-default'>Създаване на отговор</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Назад към категориите</a></p>";

?>


<?php
include_once('includes/footer.php')
?>