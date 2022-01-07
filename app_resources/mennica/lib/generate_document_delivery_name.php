<?php
require("../../../config/db.class.php");
$arrival_type_id = "1";//dostawa
$arrival_type_prefix = "N";//dostawa

$storage_id = $_POST['storage_id'];

$storage_name = explode(" ", $_POST['storage_name']);
$prefix_storage = strtoupper(substr($storage_name[1], 0, 3));

$document_name_generate->create_document_new_delivery($arrival_type_id, $storage_id, $prefix_storage, $arrival_type_prefix);
?>