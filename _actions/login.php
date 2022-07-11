<?php

session_start();

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST['email'];
$password = $_POST['password'];


$table = new UsersTable(new MySQL());

$user = $table->findByEmailAndPassword($email, $password);

if($user) {
	if($user->suspended === "1"){
		HTTP::redirect("/index.php", "suspended=1");
	}

	$token = sha1(rand(1, 1000) .time());
	$_SESSION['csrf'] = $token;

	$_SESSION['user'] = $user;
	HTTP::redirect("/profile.php");

} else {
	HTTP::redirect("/index.php","incorrect=1");
}
