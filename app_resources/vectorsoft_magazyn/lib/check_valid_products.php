<?php
require('../../../config/db.class.php');
//print_r($_POST);

for($i=0; $i!=1; $i++)
{	
	$item_sn = $_POST['item_sn'][$i];
	$item_product_id = $_POST['item_product_id'][$i];
	$storage_id = $_POST['storage_id'];
	
	echo $vectorsoft_magazyn->validProductSerialNumbers($item_product_id, $item_sn, $storage_id);
	
	//echo "validProductSerialNumbers($item_product_id, $item_sn, $storage_id)";
}
?>