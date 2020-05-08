  
<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
$message='';
$alert_type='';
if(count($_POST)>0){
	require_once('../../Post.php');
	$post=new Post();
	$error=$post->create($_POST);
	if(isset($error{0})){
		$message=$error;
		$alert_type='danger';
	}
	else{
		$message='The post has been added';
		$alert_type='success';
	}
}
echo $message;