<?php
require('../../../config/db.class.php');
$new_device = $_POST['new_device'];
$new_device_type = $_POST['new_device_type'];

$vectorsoft_magazyn->add_device_definitions_outofstorage($new_device_type,$new_device);
?>