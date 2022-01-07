<?php
require('../../../config/db.class.php');
//print_r($_POST);
$arrival_type_id = '4';
$document_name = $_POST['document_name'];
$storage_id = $_SESSION['mennica_magazyn_storage_id'];
$create_user_id = $_SESSION['mennica_magazyn_user_id'];
$create_date = date("Y-m-d H:i:s");
$damaged_devices_status = '3';
$mennica_service_id = '0';//transfer na magazyn, serwis mennicy 0


$arrival_id = $vectorsoft_magazyn->create_arrival($arrival_type_id, $document_name, $storage_id, $create_user_id, $create_date);
//update arrival cache document_name
$document_name_generate->update_arrival_document_name_cache($document_name, $arrival_type_id, $storage_id);

for($i=0; $i!=count($_POST['product_id']); $i++)
{	
	$damaged_devices_id = $_POST['damaged_devices_id'][$i];
	$item_name = $_POST['product_name'][$i];
	$item_product_id = $_POST['product_id'][$i];
	$product_id = $_POST['product_id'][$i];
	$item_sn = str_replace('�','',$_POST['sn'][$i]);
	$sn = str_replace('�','',$_POST['sn'][$i]);
	$item_quantity = $_POST['quantity'][$i];
	$product_id_quantity = $_POST['quantity'][$i];
	$quantity_damaged = 0-$_POST['quantity'][$i];
	echo $sn;
	
	//create record in product_details
	$vectorsoft_magazyn->accept_delivery_temp($item_name, $item_sn, $item_quantity, $item_product_id, $document_name, $storage_id, $arrival_id);
	//create record in arrival_items
	$vectorsoft_magazyn->insertItemsTo_arrival_itmes($arrival_type_id, $arrival_id, $storage_id, $product_id, $product_id_quantity, $document_name, $item_name);
	//transfer to storage from damaged_devices
	$vectorsoft_magazyn->transfer_from_damaged_devices_insert($arrival_id, $product_id, $quantity_damaged, $sn, $storage_id, $damaged_devices_status, $damaged_devices_id, $mennica_service_id);

}

?>