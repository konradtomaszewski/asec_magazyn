<?php
require('../../../config/db.class.php');
$external_repair_id = $_POST['external_repair_id'];

$vectorsoft_magazyn->external_repair_to_storage($external_repair_id);
?>