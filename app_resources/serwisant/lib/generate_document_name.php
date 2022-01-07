<?php
require("../../../config/db.class.php");

$arrival_type_id = $_POST['arrival_type_id'];
$arrival_type_prefix = $_POST['arrival_type_prefix'];

$storage_id = $_SESSION['mennica_magazyn_storage_id'];

$storage_name = explode(" ", $_SESSION['mennica_magazyn_storage_name']);
$prefix_storage = strtoupper(substr($storage_name[1], 0, 3));

$document_name_generate->create_document_name($arrival_type_id, $storage_id, $prefix_storage, $arrival_type_prefix);

?>