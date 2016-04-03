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

	?>

	<form action='index.php' method='post' class='form-horizontal'>
		<div class="form-group">
		<label for="inputEmail4" class="col-sm-4 control-label">Username</label>
		<div class="col-sm-5">
			<input type='text' class='form-control' name='username' placeholder="Потребителско име">
		</div>
		</div>
		<div class="form-group">
		<label for="inputPassword5" class="col-sm-4 control-label">Password</label>
		<div class="col-sm-5">
		<input type='password' class='form-control'id="inputPassword3" name='password' placeholder="парола">
		</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-4 col-sm-5 ">
			<input type='submit' name='submit' value='Регистрация' class='btn btn-default'>
		</div>
		</div>
	</form>

<?php
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
				echo "<a href='login.php'>Вход</a>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}

}
			//echo "<a href='login.php'>Log In</a>";


?>


<?php
include_once('includes/footer.php')
?>