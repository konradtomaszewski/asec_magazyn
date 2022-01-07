<?php
require("../../../config/db.class.php");

$product_name = $_POST['product_name'];
$automat_type = $_POST['automat_type'];

$mennica_magazyn->new_product($product_name, $automat_type);
?>