<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');


echo "Cetegories";
echo "<select name='categories'>";
$read_query = 	"SELECT * FROM categories 
				WHERE date_deleted IS NULL AND id_category=id_category 
				";
$read_result = mysqli_query($conn, $read_query);
if (mysqli_num_rows($read_result) > 0) {
		while($row = mysqli_fetch_assoc($read_result)){	
echo "<option  value=".$row['id_category'].">".$row['name_of_category']."</option>";	
}}			
echo "</select>";


if(empty($_POST['submit'])){
	echo "<p>Insert new question </p>";
	echo "<form action='create_questions.php' method='post'>";
//city_name!!! same as in the DB!!!
	echo "<textarea name='question' rows='10' cols='50'></textarea>";
	echo "<p><input type='submit' name='submit' value='insert'></p>";
	echo "</form>";
}
else{
//city_name!!! same as in the DB!!!	
	$question = $_POST['question'];
		//you can shorten var names - $insert_query - $q or smth else
	$insert_query = 	"INSERT INTO questions (question) 
						VALUES ('$question')";
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

				echo "<p><a href='create_ans.php'>Create answer</a></p>";
				echo "<p><a href='create.php'>Back to category</a></p>";