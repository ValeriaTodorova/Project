<?php
include_once('includes/header.php')
?>
<?php
//you can include the db connection code in separate file
//and include this file
$conn = mysqli_connect('localhost', 'root', '', 'bulgarian_language');
// if (!$conn) {
//  	die("Connection failed: " .mysqli_connect_error());
//  	} else {
//  	echo "Connected successfully !";
//  	}
if(empty($_POST['submit'])){
//it is better the get param to be id_city - not just id
	$id_answer = $_GET['id'];
//echo $id_city;
	$q = "SELECT * FROM answers WHERE id_answer = $id_answer";
	$res = mysqli_query($conn, $q);
//we expect as a result only one row
//so we do not need the while cycle
	$row = mysqli_fetch_assoc($res);
//var_dump($row);
//form is exactly the same as in create.php
//MIND THE VALUES!!! AND HIDDEN INPUT TYPE
	echo "<h3>Редактирай отговор</h3>";
	echo "<form action='update_ans.php' method='post'>";
	//! we need it to transfer the id of the updated row
	echo "<input type='hidden' name='id_answer' value=".$row['id_answer'].">";
//city_name!!! same as in the DB!!!
	echo "<input type='text' class='form-control' name='answer' value='".$row['answer']."'>";
	echo "<input type='submit' name='submit' value='Редактирай' class='btn btn-default'>";
	echo "</form>";
}else {
	//UPDATE QUERY CODE AS FOLLOWS
//var_dump($_POST);
	$id_answer = $_POST['id_answer'];
	$answer = $_POST['answer'];
	$update_query = "UPDATE answers
					SET answer ='$answer' 
					WHERE id_answer=$id_answer";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				//success code can be read db query - 
 				//you can print the entire info + your newly update db query 
		
 				//it depends on you and UI you have designed ...
 				//the same is with unseccess code
 				//IT IS A GOOD PRACTICE YOU AND USER TO KNOW EXACTLY WHAT THE RESULT IS - SUCCESS OR NOT
		echo "Успешно променихте $answer в базата данни!";
		echo "<p><a href='read_ans.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}
echo "<p><a href='create_questions.php' class='btn btn-default'>Създай въпрос</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Към категориите</a></p>";
?>
<?php
include_once('includes/footer.php')
?>