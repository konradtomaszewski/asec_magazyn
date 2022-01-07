<?php
require('../../../config/db.class.php');
print_r($_POST);
$document_name = $_POST['document_name'];
$storage_id = $_POST['storage_id'];

for($i=0; $i!=count($_POST['item_name']); $i++)
{	
	$item_id = $_POST['item_id'][$i];
	$item_name = $_POST['item_name'][$i];
	$item_sn = $_POST['item_sn'][$i];
	$item_quantity = $_POST['item_quantity'][$i];
	$item_product_id = $_POST['item_product_id'][$i];
	
	$mennica_magazyn->correct_arrival_delivery_temp($item_id, $item_product_id, $item_sn, $item_quantity, $document_name, $storage_id);
}

?>