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
	$id_question = $_GET['id'];
//echo $id_city;
	$q = "SELECT * FROM questions WHERE id_question = $id_question";
	$res = mysqli_query($conn, $q);
//we expect as a result only one row
//so we do not need the while cycle
	$row = mysqli_fetch_assoc($res);
//var_dump($row);
//form is exactly the same as in create.php
//MIND THE VALUES!!! AND HIDDEN INPUT TYPE
	echo "<h3>Edit the question</h3>";
	echo "<form action='update_questions.php' method='post'>";
	//! we need it to transfer the id of the updated row
	echo "<input type='hidden' name='id_question' value=".$row['id_question'].">";
//city_name!!! same as in the DB!!!
	echo "<input type='text' class='form-control'  name='question' value='".$row['question']."'>";
	echo "<input type='submit' name='submit' value='update' class='btn btn-default'>";
	echo "</form>";
}else {
	//UPDATE QUERY CODE AS FOLLOWS
//var_dump($_POST);
	$id_question = $_POST['id_question'];
	$question = $_POST['question'];
	$update_query = "UPDATE questions
					SET question ='$question' 
					WHERE id_question=$id_question";
					
	$update_result= mysqli_query($conn, $update_query);
	if ($update_result) {
 				//success code can be read db query - 
 				//you can print the entire info + your newly update db query 
		
 				//it depends on you and UI you have designed ...
 				//the same is with unseccess code
 				//IT IS A GOOD PRACTICE YOU AND USER TO KNOW EXACTLY WHAT THE RESULT IS - SUCCESS OR NOT
		echo "Успешно променихте $question в базата данни!";
		echo "<p><a href='read_questions.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}
				echo "<p><a href='create_ans.php'class='btn btn-default'>Create answer</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Back to category</a></p>";
?>
<?php
include_once('includes/footer.php')
?>