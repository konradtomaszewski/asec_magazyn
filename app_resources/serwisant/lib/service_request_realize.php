<?php
session_start();
require('../../../config/db.class.php');
$service_user_name = $_SESSION['mennica_magazyn_user_name'];
//print_r($_POST);
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$arrival_id = $_POST['arrival_id'];
$quantity = 0-$_POST['quantity'];
$quantity_damaged = $_POST['quantity'];

$sn = $_POST['sn'];
$service_status = $_POST['service_status'];
$bus_number = $_POST['bus_number'];
$automat_number = $_POST['automat_number'];
$storage_id = $_SESSION['mennica_magazyn_storage_id'];

//print_r($_POST);
$service_request_id = $serviceman->realize_service_request($product_id, $quantity, $sn, $service_status, $bus_number, $automat_number, $storage_id, $product_name, $service_user_name);

if($service_status == '2')
{
	$serviceman->add_damaged_devices($service_request_id, $product_id, $sn, $quantity_damaged, $storage_id);
}

?>