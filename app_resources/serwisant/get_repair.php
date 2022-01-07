<?php
require('../../config/db.class.php');
$damaged_devices_id = $_POST['damaged_devices'];
$service_request_id = $_POST['service_request'];


//set damaged_devices status=6 ->W naprawie
$serviceman->set_damaged_devices_for_repair($damaged_devices_id);

//insert damaged_devices to repairs table
$serviceman->set_repair_devices($damaged_devices_id, $service_request_id);
?>