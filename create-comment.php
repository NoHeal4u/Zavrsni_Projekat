<?php include('connection.php'); ?>

<?php

if ($_POST['commentsID'] !='' && $_POST['text'] !='' && $_POST['autor'] !='') {
	// echo 'radi';


$commentsID = $_POST['commentsID'];
$text = $_POST['text'];
$autor = $_POST['autor'];
$postID = $_GET['Id'];

$query = "insert into comments(Id, Author, Text, Post_id) values($commentsID,'$autor','$text', $postID);";

// echo($query);



$statement = $connection->prepare($query);
$statement->execute();


// // PDO::query($query);
// // echo($query);
// // echo $commentsID;
// // echo $text;
// // echo $autor;
// // echo $postID;


 // header("Location: single-post1.php?Id=$postID" );

// }
// else{  
// 	// echo('<script type="text/javascript">var element = document.getElementById("gadjaj"); element.innerHTML = "SVA POLJA MORAJU BITI POPUNJENA"; element.style.color = "red";</script>');

// 			// echo '<script type="text/javascript">alert("Moras popuniti sva polja!!! pritisni back dugme");</script>';

 }	else {

 }

header("Location: single-post1.php?Id=$postID" );

?>