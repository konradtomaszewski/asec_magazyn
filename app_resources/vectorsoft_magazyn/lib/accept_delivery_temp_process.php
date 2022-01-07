<?php
require('../../../config/db.class.php');
$arrival_type_id = $_POST['arrival_type_id'];
$document_name = $_POST['document_name'];
$storage_id = $_POST['storage_id'];

$create_user_id = $_POST['create_user_id'];
$create_date = $_POST['create_date'];	
	
//print_r($_POST);
$arrival_id = $vectorsoft_magazyn->create_arrival($arrival_type_id, $document_name, $storage_id, $create_user_id, $create_date);

for($i=0; $i!=count($_POST['item_name']); $i++)
{	
	$item_name = $_POST['item_name'][$i];
	$item_sn = $_POST['item_sn'][$i];
	$item_quantity = $_POST['item_quantity'][$i];
	$item_product_id = $_POST['item_product_id'][$i];
	
	//aktualizacja arrival_delivery_temp na wypadek zmian w quantity lub sn
	$vectorsoft_magazyn->update_arrival_delivery_temp($item_product_id, $item_sn, $item_quantity, $document_name, $storage_id);
		
	$vectorsoft_magazyn->accept_delivery_temp($item_name, $item_sn, $item_quantity, $item_product_id, $document_name, $storage_id, $arrival_id);
}
$vectorsoft_magazyn->getItemsFrom_deliveryTemp($arrival_type_id, $arrival_id, $document_name, $storage_id, $item_name);

$vectorsoft_magazyn->delete_deliveryTemp($document_name, $storage_id);
?>