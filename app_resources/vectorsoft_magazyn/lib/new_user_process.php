<?php
require('../../../config/db.class.php');
//print_r($_POST);
$login = $_POST['login'];
$password = $_POST['password'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$user_group_id = $_POST['user_group_id'];
$storage_id = $_POST['storage_id'];

$user->new_user($login, $password, $user_name, $email, $user_group_id, $storage_id);
?>