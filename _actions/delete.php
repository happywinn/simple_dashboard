<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$id = $_GET['id'];

if($auth->value > 1 and $_GET['csrf'] === $_SESSION['csrf'] ) {
	$table->delete($id);
}

HTTP::redirect("/admin.php");

