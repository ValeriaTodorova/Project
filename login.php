<?php
include_once('includes/header.php')
?>

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
 // if (!$conn) {
 // 	die("Connection failed: " .mysqli_connect_error());
	// } else {
 // 	echo "Connected successfully !";
 // 	}
 	if(empty($_POST['submit'])){


	
	echo "<form action='login.php' method='post'>";
//city_name!!! same as in the DB!!!
	echo "<p><input type='text' name='username'></p>";
	echo "<p><input type='password' name='password'></p>";

	echo "<p><input type='submit' name='submit' value='Log in'></p>";
	echo "</form>";


}
else {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	var_dump($username);

$read_query = 	"SELECT * FROM users 
				WHERE username = '$username'";
$read_result = mysqli_query($conn, $read_query);
$row = mysqli_fetch_assoc($read_result);
var_dump($row);
if($row['password'] === $password){
if($row['role'] == 1){
	header('Location: admin.php');
}
elseif($row['role'] ==0){
	header('Location: user.php');

}
}
else {
	echo "Wrong";
}
//or table
//echo "<ul>";
	// if (mysqli_num_rows($read_result) > 0) {
	// 	while($row = mysqli_fetch_result($read_result)){ 
	// 	echo '<li>'.$row['username'];
	// 	//for U D purpose we need update and delete buttons/links
	// 	//we also need $row['id_city'] to know exactly which row of the table to 
	// 	//update or to delete
	// 	echo ' '.'<a href="update.php?id='.$row['id_type'].'">Edit</a>';// kriene na id
	// 	echo ' '.'<a href="delete.php?id='.$row['id_type'].'">Delete</a>';
	// 	echo '</li>';
	// 	}
	// }
}
?>


<?php
include_once('includes/footer.php')
?>