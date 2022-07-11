<?php
include("vendor/autoload.php");

use Helpers\Auth;

$auth = Auth::check();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- bootstrap 4 -->

<style type="text/css">
	
</style>
</head>
<body>
	<div class="container py-5 w-50">
		<h3 class="">
			<?= $auth->name ?>
			<span class="badge badge-dark text-light float-right">
				<?= $auth->role ?>
			</span>
		</h3>
		<hr>

		<?php if(isset($_GET['error'])): ?>
			<div class="alert alert-warning">
				Cannot upload file
			</div>
		<?php endif ?>

		<?php if($auth->photo): ?>
			<img class="img-thumbnail mb-3"
				src="_actions/photos/<?= $auth->photo ?>"
				alt="Profile Photo" width="200">
		<?php endif ?>

		<form action="_actions/upload.php" method="post"
			enctype="multipart/form-data">
			<div class="input-group mb-3">
				<input type="file" name="photo"
					class="form-control">
				<button class="btn btn-secondary">Upload</button>
			</div>
		</form>

		<ul class="list-group mb-2">
			<li class="list-group-item">
				<b>Email:</b> <?= $auth->email ?>
			</li>
			<li class="list-group-item">
				<b>Phone:</b> <?= $auth->phone ?>
			</li>
			<li class="list-group-item">
				<b>Address:</b> <?= $auth->address ?>
			</li>
		</ul>

		<a href="admin.php" class="btn btn-success text-light">Manage Users</a>
		<a href="_actions/logout.php" class="btn btn-secondary text-light">Logout</a>
	</div>
</body>
</html>