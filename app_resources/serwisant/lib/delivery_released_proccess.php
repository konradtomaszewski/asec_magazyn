<?php
require('../../../config/db.class.php');
$arrival_type_id = '2';

$release_user_id = $_POST['release_user_id'];
$release_user_name = $_POST['release_user_name'];
$document_name = $_POST['document_name'];
$storage_id = $_POST['storage_id'];

	
//print_r($_POST);
$arrival_id = $vectorsoft_magazyn->create_release_arrival($arrival_type_id, $document_name, $storage_id, $release_user_id);
//update arrival cache document_name
$document_name_generate->update_arrival_document_name_cache($document_name, $arrival_type_id, $storage_id);

for($i=0; $i!=count($_POST['item_name']); $i++)
{	
	//pobranie id urządzenia na podstawie jego nazwy
	$item_product_id = $vectorsoft_magazyn->getProduct_id($_POST['item_name'][$i]);


	$item_name = $_POST['item_name'][$i];
	//$item_sn = $_POST['item_sn'][$i];
	$item_sn = '';
	$sn = '';
	$item_quantity = 0-$_POST['item_quantity'][$i];
	$quantity = $_POST['item_quantity'][$i];
	
	/*
	$vectorsoft_magazyn->release_delivery($arrival_type_id, $item_name, $item_sn, $item_quantity, $item_product_id, $document_name, $storage_id, $arrival_id);
	$vectorsoft_magazyn->create_service_request($arrival_id, $item_product_id, $item_sn, $quantity, $storage_id, $release_user_id, $document_name, $item_name, $release_user_name);
	*/
	
	/**TRANSACTION**/
	$vectorsoft_magazyn->release_delivery_and_create_service_request_TRANSACTION($arrival_type_id, $item_name, $item_sn, $quantity, $item_quantity, $item_product_id, $document_name, $storage_id, $arrival_id, $release_user_id, $release_user_name);
}
?>