<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
$message='';
$alert_type='';
if(count($_POST)>0){
	require_once('../../User.php');
	$user=new User;
	$error=$user->create($_POST);
	if(isset($error{0})){
		$message=$error;
		$alert_type='danger';
	}
	else{
		$message='The user has been added';
		$alert_type='success';
	}
}
require_once('../../template.php');
Template::showHeader('Create a new user');
if(count($_POST)>0) echo '<div class="alert alert-'.$alert_type.'" role="alert">'.$message.'</div>';
	?>
	<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">First name</label>
    <input type="text" class="form-control" name="first_name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last name</label>
    <input type="text" class="form-control" name="last_name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Create new user</button>
</form>
<?php

Template::showFooter();