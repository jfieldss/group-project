<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../Post.php');
$post=new Post();
$post->delete($_GET['id']);
header('location:index.php');