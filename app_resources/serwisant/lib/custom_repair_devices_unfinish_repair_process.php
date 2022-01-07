<?php
require('../../../config/db.class.php');
$repair_id = $_POST['repair_id'];
$damaged_devices_id = $_POST['damaged_devices_id'];

$serviceman->set_unfinish_repair_devices($repair_id);
$serviceman->set_unfinish_damaged_devices($damaged_devices_id);
?>