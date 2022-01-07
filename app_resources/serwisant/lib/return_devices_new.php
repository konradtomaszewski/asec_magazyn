<?php
require('../../../config/db.class.php');
$service_user_name = $_SESSION['mennica_magazyn_user_name'];
$service_status = '3';
$bus_number = '';
$automat_number = '';
$storage_id = $_SESSION['mennica_magazyn_storage_id'];

for($i=0; $i!=count($_POST['product_name']); $i++)
{	
	$product_id = $_POST['product_id'][$i];
	$product_name = $_POST['product_name'][$i];
	//$sn = $_POST['sn'][$i];
	$sn = '';
	$quantity = 0-$_POST['quantity'][$i];
	
	$service_request_id = $serviceman->realize_service_request($product_id, $quantity, $sn, $service_status, $bus_number, $automat_number, $storage_id, $product_name, $service_user_name);
}
?>