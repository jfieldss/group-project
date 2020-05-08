<?php
require_once('../../settings.php');
require_once('../Admin.php');
Admin::requireAdmin('../../index.php');
require_once('../../template.php');
Template::showHeader('Create a new post');
	?>
	<form id="post-create" method="POST" action="admin/posts/createAPI.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Event Title</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
	<label for="exampleInputEmail1">Event Description</label>
	<textarea class="form-control" name="content" ></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create new event</button>
</form>
<?php

Template::showFooter();