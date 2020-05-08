<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../MySQLDB.php');
$message='';
$alert_type='';
if(count($_POST)>0){
	require_once('../../User.php');
	$user=new User;
	$error=$user->update($_POST);
	if(isset($error{0})){
		$message=$error;
		$alert_type='danger';
	}
	else{
		$message='The user data have been updated';
		$alert_type='success';
	}
}

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
	Template::showHeader('Edit user information');
	echo '<a class="btn btn-outline-danger" href="delete.php?id='.$_GET['id'].'">Delete user</a> 
	<a class="btn btn-outline-primary" href="index.php">Go back</a>';
	if(count($_POST)>0) echo '<div class="alert alert-'.$alert_type.'" role="alert">'.$message.'</div>';
		?>
		<form action="edit.php?id=<?= $_GET['id'] ?>" method="POST">
	  <div class="form-group">
		<label for="exampleInputEmail1">First name</label>
		<input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>" aria-describedby="emailHelp">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Last name</label>
		<input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>" aria-describedby="emailHelp">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		<input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" aria-describedby="emailHelp">
		<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" name="password" value="<?= $user['password'] ?>" >
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Status</label>
		<input type="number" class="form-control" name="status" value="<?= $user['status'] ?>" aria-describedby="emailHelp">
	  </div>
	  <button type="submit" class="btn btn-primary">Save user data</button>
	</form>
	<?php
}
Template::showFooter();