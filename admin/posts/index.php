<?php
require_once('../../settings.php');

require_once('../Admin.php');
Admin::requireAdmin('../../index.php');

require_once('../../MySQLDB.php');
require_once('../../template.php');

Template::showHeader('Manage events');

?>
<a class="btn btn-primary" href="create.php">Create new event</a>
<?php
require_once('../../Post.php');
$pdo=MySQLDB::connect();
$rows=$pdo->query('SELECT * FROM posts');
echo '<table class="table">';
$counter=0;
while($row=$rows->fetch()){
	$post=new Post($row);
	$post->showTableRow();
}
echo '</table>';
Template::showFooter();