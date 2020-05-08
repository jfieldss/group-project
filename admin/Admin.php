<?php


class Admin{
	static function requireAdmin($redirect_URL){
		require_once('../MySQLDB.php');
		$pdo=MySQLDB::connect();
		$query=$pdo->prepare('SELECT role FROM users WHERE ID=?');
		$query->execute([$_SESSION['user/ID']]);
		$user=$query->fetch();
		if($user['role']<1) header('location: '.$redirect_URL);
	}
}