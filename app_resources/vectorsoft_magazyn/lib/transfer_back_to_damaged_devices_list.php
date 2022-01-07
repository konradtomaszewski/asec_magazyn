<?php
require('../../../config/db.class.php');

$damaged_devices_item = $_POST['damaged_devices_item'];
print_r($_POST['damaged_devices_item']);
$vectorsoft_magazyn->transfer_back_to_damaged_devices_list($damaged_devices_item);

?>