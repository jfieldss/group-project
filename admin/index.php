<?php
require_once('../theme/template.php');
require_once('../auth/Auth.php');
if(!Auth::is_logged()) header('location: ../index.php');
Auth::requireAdmin('../index.php');

Template::showHeader('Welcome to the Admin Section!');
?>
	<p><a href="users">Manage users</a></p>
	<p><a href="pets">Manage pets</a></p>
<?php
Template::showFooter();