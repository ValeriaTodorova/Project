<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	echo "<p>Insert new category </p>";
	echo "<form action='create.php' method='post'>";
//city_name!!! same as in the DB!!!
	echo "<input type='text' name='name_of_category'>";
	echo "<input type='submit' name='submit' value='insert'>";
	echo "</form>";
}
else{
//city_name!!! same as in the DB!!!	
	$name_of_category = $_POST['name_of_category'];
		//you can shorten var names - $insert_query - $q or smth else
	$insert_query = 	"INSERT INTO categories (name_of_category) 
						VALUES ('$name_of_category')";
			//or $result
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				//success code can be read db query - 
				//you can print the entire info your newly inserted in the db query 
				//is appended to
				//it depends on you and UI you have designed ...
				//the same with unseccess code=
				echo "Успешно добавихте $name_of_category в базата данни!";
				echo "<p><a href='read.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}


				echo "<p><a href='create_questions.php'>Create question</a></p>";
				echo "<p><a href='create_ans.php'>Create answer</a></p>";
