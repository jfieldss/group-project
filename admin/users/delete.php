<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../User.php');
$user=new User();
$user->delete($_GET['id']);
header('location:index.php');