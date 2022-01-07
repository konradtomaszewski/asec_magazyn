<?php
require('../../../config/db.class.php');


$product_id = $_POST['product_id'];
$change_storage_id = $_POST['change_storage_id'];

$mennica_magazyn->change_storageProduct_definitions($product_id, $change_storage_id);
?>