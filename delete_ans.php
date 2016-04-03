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
$id_answer = $_GET['id'];
$date = date('Y-m-d');
//var_dump($id_city);
//echo $date;
$delete_query = "UPDATE answers SET date_deleted ='$date' WHERE id_answer=$id_answer";
$delete_result = mysqli_query($conn, $delete_query);
//IT IS A GOOD PRACTICE TO BE INFORMED IF YOU HAVE DELETED OR NOT 
//YOU ALREADY KNOW ABOUT THE FOLLOWING CODE
if ($delete_result) {
 				//success code can be read db query - 
 				//you can print the entire info + your newly update db query 
		
 				//it depends on you and UI you have designed ...
 				//the same is with unseccess code
 				//IT IS A GOOD PRACTICE YOU AND USER TO KNOW EXACTLY WHAT THE RESULT IS - SUCCESS OR NOT
		echo "<h3>Успешно изтрихте запис в базата данни!</h3>";
		echo "<p><a href='read.php'>Read DB</a></p>";
	}else{
		echo "<h3>Неуспешно изтриване на запис в базата данни! Моля опитайте по-късно!</h3>";
		//echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
	echo "<p><a href='create_questions.php' class='btn btn-default'>Create question</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Back to category</a></p>";
?>


<?php
include_once('includes/footer.php')
?>