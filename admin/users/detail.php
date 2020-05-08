<?php
// read users from the json file
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../MySQLDB.php');
require_once('../../template.php');

$pdo=MySQLDB::connect();
$query=$pdo->prepare('SELECT * FROM users WHERE ID=?');
$query->execute([$_GET['id']]);
if($query->rowCount()==0){
	Template::showHeader('User not found');
	echo 'There are no records matching your selection
	<a class="btn btn-outline-primary" href="index.php">Go back</a>';
}else{
	$user=$query->fetch();
	Template::showHeader($user['first_name'].' '.$user['last_name'].'\'s details');
	?>
	<a class="btn btn-outline-primary" href="index.php">Go back</a>
	<a class="btn btn-warning" href="edit.php?id=<?= $_GET['id'] ?>">Edit this user</a>
	<?php

	// print each user using a for loop
		echo '<h3>'.$user['first_name'].' '.$user['last_name'].'</h3>';
		echo '<p class="lead">E-mail: '.$user['email'].'</p>';
	}
Template::showFooter();