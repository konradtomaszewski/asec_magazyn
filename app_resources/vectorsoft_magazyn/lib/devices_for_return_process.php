<?php
require('../../../config/db.class.php');
print_r($_POST);

$arrival_type_id = '3'; //zwrócono
$service_status_id = '4';
@$document_name = $_POST['document_name'];

$storage_id = $_SESSION['mennica_magazyn_storage_id'];
$create_date = date("Y-m-d H:i:s");
$create_user_id = $_SESSION['mennica_magazyn_user_id'];	
$release_user_id = $_POST['serviceman_user_id'];

echo $document_name;
$arrival_id = $vectorsoft_magazyn->create_arrival($arrival_type_id, $document_name, $storage_id, $create_user_id, $create_date);
//update arrival cache document_name
$document_name_generate->update_arrival_document_name_cache($document_name, $arrival_type_id, $storage_id);

for($i=0; $i!=count($_POST['product_name']); $i++)
{	
	$product_name = $_POST['product_name'][$i];
	$sn = $_POST['sn'][$i];
	$quantity = $_POST['quantity'][$i];
	$product_id = $_POST['product_id'][$i];
	$vectorsoft_magazyn->accept_devices_for_return($product_name, $sn, $quantity, $product_id, $document_name, $storage_id, $arrival_id);
	$vectorsoft_magazyn->return_to_arrival_items($product_id, $quantity, $arrival_id, $arrival_type_id, $storage_id);
	$vectorsoft_magazyn->return_to_service_request($arrival_id, $product_id, $sn, $quantity, $storage_id, $release_user_id, $service_status_id);
}
$vectorsoft_magazyn->update_arrival_release_user($arrival_id, $release_user_id);



?>