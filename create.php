
<?php
include_once('includes/header.php')
?>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
// if (!$conn) {
// 	die("Connection failed: " .mysqli_connect_error());
// 	} else {
// 	echo "Connected successfully !";
// 	}
if(empty($_POST['submit'])){
	echo "<h3>Въведете нова категория </h3>";
	echo "<form action='create.php' method='post'>";
//city_name!!! same as in the DB!!!
	echo "<p><input type='text' class='form-control' placeholder='Въведи категория' name='name_of_category'></p>";
	echo "<p><input type='submit' name='submit' value='Въведи' class='btn btn-default'></p>";
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


				echo "<p><a href='create_questions.php' class='btn btn-default'>Създаване на Въпрос</a></p>";
				echo "<p><a href='select1.php' class='btn btn-default'>Създаване на отговор</a></p>";
				
?>


<?php
include_once('includes/footer.php')
?>