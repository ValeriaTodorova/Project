<?php
include_once('includes/header.php')
?>

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');


if(empty($_POST['submit'])){
	echo "<h3>Insert new question </h3>";
	echo "<form action='create_questions.php' method='post'>";
//city_name!!! same as in the DB!!!
	echo "<h5>Cetegories,</h5>";
	echo "<p><select class='form-control' name='categories'></p>";
	$read_query = 	"SELECT * FROM categories 
					WHERE date_deleted IS NULL ";
	$read_result = mysqli_query($conn, $read_query);
	if (mysqli_num_rows($read_result) > 0) {
			while($row = mysqli_fetch_assoc($read_result)){	
	echo "<option  value=".$row['id_category'].">".$row['name_of_category']."</option>";	
	}}			
	echo "</select>";


	echo "<p><textarea class='form-control' rows='5' placeholder='New question here' name='question' rows='9' cols='50' value='Insert new question' ></textarea></p>";
	echo "<p><input type='submit' name='submit' value='insert'></p>";
	echo "</form>";
}
else{
//city_name!!! same as in the DB!!!	
	$question = $_POST['question'];
	$category = $_POST['categories'];
		//you can shorten var names - $insert_query - $q or smth else
	$insert_query = 	"INSERT INTO questions (question,id_category) 
						VALUES ('$question','$category')";

	echo $insert_query;
			//or $result
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				//success code can be read db query - 
				//you can print the entire info your newly inserted in the db query 
				//is appended to
				//it depends on you and UI you have designed ...
				//the same with unseccess code=
				echo "Успешно добавихте $question в базата данни!";
				echo "<p><a href='read_question.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}

				echo "<p><a href='create_ans.php' class='btn btn-default'>Create answer</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Back to category</a></p>";

?>


<?php
include_once('includes/footer.php')
?>