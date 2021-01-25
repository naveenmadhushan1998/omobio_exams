<?php require_once('connection.php'); ?> .

<?php
$query = "SELECT * FROM user";

$result = mysqli_query($connection, $query);

if($result){
	echo mysqli_num_rows($result). " Recorders found";
	$recorde = mysqli_fetch_assoc($result);
	echo  "<pre>";
	print_r($recorde);
	echo "<pre>";

}

?>


<?php mysqli_close($connection); ?>