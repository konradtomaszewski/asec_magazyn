<?php
require('../../../config/db.class.php');
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$automat_type = $_POST['automat_type'];
$mennica_magazyn->update_product_name($product_id, $product_name, $automat_type);
?>