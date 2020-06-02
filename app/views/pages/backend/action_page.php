<?php
$link = mysqli_connect("127.0.0.1", "root", "sz1msql", "medi");

if (!$link) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}




$data['alert'] = null;

print_r($_POST);

$sql = "INSERT INTO `products` (`name`, `model`, `price`, `stock`, `subcat`, `likes`, `psd`, `pfd`, `pfs`, `created_at`, `updated_at`)
VALUES ('".$_POST['pname']."', '".$_POST['pmodel']."', NULL, '".$_POST['pstock']."', '".$_POST['subcategory']."', '1', '".$_POST['psd']."', '".$_POST['pfd']."', '".$_POST['pfs']."', now(), now())";


if (mysqli_query($link, $sql) === TRUE) {
	$data['alert']['success'] = "Data was inserted succesfully";
	insertImage(mysqli_insert_id($link));
}


function insertImage($subcatID){
// Insert Image data
$data['pi1'] = addslashes(file_get_contents($_FILES['pi1']['tmp_name'])); //SQL Injection defence!
$data['pi2'] = addslashes(file_get_contents($_FILES['pi2']['tmp_name'])); //SQL Injection defence!
$data['pi3'] = addslashes(file_get_contents($_FILES['pi3']['tmp_name'])); //SQL Injection defence!
$data['pi4'] = addslashes(file_get_contents($_FILES['pi4']['tmp_name'])); //SQL Injection defence!
$data['pi5'] = addslashes(file_get_contents($_FILES['pi5']['tmp_name'])); //SQL Injection defence!
$data['pc'] = addslashes(file_get_contents($_FILES['pc']['tmp_name'])); //SQL Injection defence!
$data['pm'] = addslashes(file_get_contents($_FILES['pm']['tmp_name'])); //SQL Injection defence!


$sql = "INSERT INTO `image` (`pi1`, `pi2`, `pi3`, `pi4`, `pi5`, `pc`, `pm`,`product`) VALUES ('".$data['pi1']."','".$data['pi2']."','".$data['pi3']."','".$data['pi4']."','".$data['pi5']."','".$data['pc']."','".$data['pm']."','".$subcatID."')";


if (mysqli_query($link, $sql) === TRUE) {
	$data['alert']['success'] = "Data was inserted succesfully";
}


}

?>