<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../MySQLDB.php');
$message='';
$alert_type='';
if(count($_POST)>0){
	require_once('../../Post.php');
	$post=new Post;
	$error=$post->update($_GET['id'],$_POST);
	if(isset($error{0})){
		$message=$error;
		$alert_type='danger';
	}
	else{
		$message='The post data have been updated';
		$alert_type='success';
	}
}

require_once('../../template.php');
$pdo=MySQLDB::connect();
$query=$pdo->prepare('SELECT * FROM posts WHERE ID=?');
$query->execute([$_GET['id']]);
if($query->rowCount()==0){
	Template::showHeader('Post not found');
	echo 'There are no records matching your selection 
	<a class="btn btn-outline-primary" href="index.php">Go back</a>';
}else{
	$post=$query->fetch();
	Template::showHeader('Edit post information');
	echo '<a class="btn btn-outline-danger" href="delete.php?id='.$_GET['id'].'">Delete post</a> 
	<a class="btn btn-outline-primary" href="index.php">Go back</a>';
	if(count($_POST)>0) echo '<div class="alert alert-'.$alert_type.'" role="alert">'.$message.'</div>';
		?>
		<form action="edit.php?id=<?= $_GET['id'] ?>" method="POST">
	  <div class="form-group">
		<label for="exampleInputEmail1">Event Title</label>
		<input type="text" class="form-control" name="title" value="<?= $post['title'] ?>" aria-describedby="emailHelp">
	  </div>
	  <div class="form-group">
		<label for="exampleInputEmail1">Event Discription</label>
		<textarea class="form-control" name="content"><?= $post['content'] ?></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary">Save event data</button>
	</form>
	<?php
}
Template::showFooter();