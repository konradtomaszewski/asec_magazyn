<?php
require('../../../config/db.class.php');
//print_r($_POST);
$arrival_type_id = '5';
$document_name = $_POST['document_name'];
$storage_id = $_SESSION['mennica_magazyn_storage_id'];
$create_user_id = $_SESSION['mennica_magazyn_user_id'];
$create_date = date("Y-m-d H:i:s");
$damaged_devices_status = '4';

$arrival_id = $vectorsoft_magazyn->create_arrival($arrival_type_id, $document_name, $storage_id, $create_user_id, $create_date);
//update arrival cache document_name
$document_name_generate->update_arrival_document_name_cache($document_name, $arrival_type_id, $storage_id);

for($i=0; $i!=count($_POST['product_id']); $i++)
{	
	if($_POST['mennica_service_id'][$i] > '0')
	{
		$damaged_devices_id = $_POST['damaged_devices_id'][$i];
		$item_name = $_POST['product_name'][$i];
		$item_product_id = $_POST['product_id'][$i];
		$product_id = $_POST['product_id'][$i];
		$item_sn = $_POST['sn'][$i];
		$sn = $_POST['sn'][$i];
		$item_quantity = $_POST['quantity'][$i];
		$product_id_quantity = $_POST['quantity'][$i];
		$quantity_damaged = 0-$_POST['quantity'][$i];
		$mennica_service_id = $_POST['mennica_service_id'][$i];
		
		//WYMAGANE DO MENNICA
		//create record in product_details
		//$vectorsoft_magazyn->broken_accept_delivery_temp($item_name, $item_sn, $item_quantity, $item_product_id, $document_name, $storage_id, $arrival_id, $mennica_service_id);
		//create record in arrival_items
		//$vectorsoft_magazyn->broken_insertItemsTo_arrival_itmes($arrival_type_id, $arrival_id, $storage_id, $product_id, $product_id_quantity, $mennica_service_id);
		//autoakceptacja uszkodzonego sprzętu po stronie mennicy do poprawnego działania raportu ilościowego
		//$mennica_magazyn->accept_arrival_broken_devices($arrival_id);
		
		//transfer to storage from damaged_devices
		$vectorsoft_magazyn->transfer_from_damaged_devices_update($arrival_id, $product_id, $quantity_damaged, $sn, $storage_id, $damaged_devices_status, $damaged_devices_id, $mennica_service_id);
		

		
	}
}
?>