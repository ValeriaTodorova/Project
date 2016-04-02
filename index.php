<?php
include_once('includes/header.php')
?>



<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
 /*if (!$conn) {
 	die("Connection failed: " .mysqli_connect_error());
	} else {
 	echo "Connected successfully !";
 	}*/
if(empty($_POST['submit'])){

	

	echo "<p>Insert username</p>";
	echo "<form action='index.php' method='post' class='form-horizontal'>";
//city_name!!! same as in the DB!!!
	echo "<p><input type='text' name='username'></p>";
	echo "<p><input type='password' name='password'></p>";

	echo "<p><input type='submit' name='submit' value='Register'></p>";
	echo "</form>";


}
else{
//city_name!!! same as in the DB!!!	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);


		//you can shorten var names - $insert_query - $q or smth else
	$insert_query = 	"INSERT INTO users (username, password) 
						VALUES ('$username', '$password')";
			//or $result
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				//success code can be read db query - 
				//you can print the entire info your newly inserted in the db query 
				//is appended to
				//it depends on you and UI you have designed ...
				//the same with unseccess code=
				echo "Успешно добавихте $username в базата данни!";
				//echo "<p><a href='read.php'>Read DB</a></p>";
				echo "<a href='login.php'>Log In</a>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}

}
			//echo "<a href='login.php'>Log In</a>";


?>


<?php
include_once('includes/footer.php')
?>