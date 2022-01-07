<?php
if($_POST)
{
	require('../../../config/db.class.php');
	$user->change_password($_POST['user_id'], $_POST['new_password']);
}
else echo "Nie wprowadzono danych";
?>