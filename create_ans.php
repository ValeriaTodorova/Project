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
	$id_question=$_POST['question'];

	echo "<h3>Insert new answer </h3>";
	echo "<form action='create_ans.php' method='post'>";
//city_name!!! same as in the DB!!!
	echo "<input type='hidden' name='id_question' value='$id_question'>" ;
	echo "<textarea class='form-control' rows='5' name='answer' rows='10' cols='50'></textarea>";
	echo "<h6>For correct answer enter 0, for wrong answer enter 1</h6>";
	echo "<input type='text' name='correct' value=''>";
	echo "<h6>Enter position from 1 to 3</h6>";
	echo "<input type='text' name='position' value=''>";
	echo "<p><input type='submit' name='submit' value='insert'></p>";
	echo "</form>";
}
else{
//city_name!!! same as in the DB!!!	

	$answer = $_POST['answer'];
	$correct=$_POST['correct'];
	$position=$_POST['position'];
	$id_question=$_POST['id_question'];
	
		//you can shorten var names - $insert_query - $q or smth else
	$insert_query = 	"INSERT INTO answers (answer,correct,position,id_question) 
						VALUES ('$answer','$correct','$position',$id_question)";
			//or $result
			$insert_result= mysqli_query($conn, $insert_query);
			if ($insert_result) {
				//success code can be read db query - 
				//you can print the entire info your newly inserted in the db query 
				//is appended to
				//it depends on you and UI you have designed ...
				//the same with unseccess code=
				echo "Успешно добавихте ".$answer.$correct.$position." в базата данни!";
				echo "<p><a href='read_ans.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}

}
				echo "<p><a href='create_questions.php' class='btn btn-default'>Create question</a></p>";
				echo "<p><a href='create.php' class='btn btn-default'>Back to category</a></p>";
/*$position_a = range(0,3);
shuffle($position_a);
$insert_query = 	"INSERT INTO answers (position) 
						VALUES ('$position_a')";*/
?>
<?php
include_once('includes/footer.php')
?>


