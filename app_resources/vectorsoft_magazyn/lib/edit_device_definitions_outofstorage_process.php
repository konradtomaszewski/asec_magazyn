<?php
require('../../../config/db.class.php');
$device_name = $_POST['device_name'];
$device_type = $_POST['device_type'];
$device_id = $_POST['device_id'];
print_r($_POST);
$vectorsoft_magazyn->edit_device_definitions_outofstorage($device_type, $device_name, $device_id);
?>