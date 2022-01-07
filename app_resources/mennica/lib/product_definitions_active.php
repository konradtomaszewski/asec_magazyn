<?php
require('../../../config/db.class.php');


$product_id = $_POST['product_id'];
$is_active = $_POST['is_active'];

$mennica_magazyn->activateProduct_definitions($product_id, $is_active);
?>