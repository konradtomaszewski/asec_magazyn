<?php
require('../../../config/db.class.php');


$product_id = $_POST['product_id'];
$sn_required = $_POST['sn_required'];

$vectorsoft_magazyn->updateProduct_definitions($product_id, $sn_required);
?>