<?php
// read users from the json file
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../MySQLDB.php');
require_once('../../template.php');

Template::showHeader('Manage users');

$pdo=MySQLDB::connect();
$rows=$pdo->query('SELECT * FROM users');
?>
<a class="btn btn-primary" href="create.php">Create new user</a>
<?php
// print each user using a for loop;
require_once('../../User.php');
echo '<table class="table">';
$counter=0;
while($row=$rows->fetch()){
	$user=new User($row['first_name'],$row['last_name'],$row['email'],$row['password']);
	echo $user->showPreview($row['ID']);
	$counter++;
}
echo '</table>';
Template::showFooter();