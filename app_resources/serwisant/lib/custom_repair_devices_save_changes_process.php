<?php
require('../../../config/db.class.php');
$repair_id = $_POST['repair_id'];
$damaged_devices_id = $_POST['damaged_devices_id'];
$service_request_id = $_POST['service_request_id'];
$sn = $_POST['sn'];
$repair_time = $_POST['repair_time'];
$description = $_POST['description'];

$serviceman->repair_save_changes($repair_id, $repair_time, $description);
$serviceman->update_sn_damaged_devices($damaged_devices_id, $sn);
$serviceman->update_sn_service_request($service_request_id, $sn);
?>