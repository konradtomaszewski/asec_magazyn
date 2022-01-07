<?php
require('../../config/db.class.php');
$user->auth_user($_POST['login'], $_POST['password']);

echo $user->getAuthUserInfo($_POST['login']);
?>