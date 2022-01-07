<?php
require('../../../config/db.class.php');
$user_id = $_POST['user_id'];
$login = $_POST['login'];
$password = $_POST['password'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$user_group_id = $_POST['user_group_id'];
$storage_id = $_POST['storage_id'];

if(strlen($password)>0)
{
	$user->update_user_pass($user_id, $login, $password, $user_name, $email, $user_group_id, $storage_id);
}
else $user->update_user($user_id, $login, $user_name, $email, $user_group_id, $storage_id);
?>