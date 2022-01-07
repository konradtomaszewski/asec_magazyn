<?php
require("../../../config/db.class.php");
$arrival_type_id = '8';
$storage_id = $_SESSION['mennica_magazyn_storage_id'];
$document_name = $_POST['document_name'];
$release_user_id = $_POST['serviceman_id'];
$release_user_name = $_POST['serviceman_name'];
$create_user_id = $_SESSION['mennica_magazyn_user_id'];
$create_date = date("Y-m-d H:i:s");
$service_status = '5';
$bus_number='';
$automat_number='';
$service_user_name = $_SESSION['mennica_magazyn_user_name'];

$arrival_id = $vectorsoft_magazyn->create_arrival($arrival_type_id, $document_name, $storage_id, $create_user_id, $create_date);
//update arrival cache document_name
$document_name_generate->update_arrival_document_name_cache($document_name, $arrival_type_id, $storage_id);

for($i=0; $i!=count($_POST['product_name']); $i++)
{	
	$product_id = $_POST['product_id'][$i];
	$product_name = $_POST['product_name'][$i];
	//$sn = $_POST['sn'][$i];
	$sn = '';
	$quantity = 0-$_POST['quantity'][$i]; //wartoœæ ujemna do wyzerowania stanu
	$quantity2 = $_POST['quantity'][$i]; //wartoœæ dodania do przekazania stocku
	
	/*
	//czyszczenie stocka serwisanta od którego przekazywane s¹ urz¹dzenia
	$forward_devices->devices_out_serviceman($arrival_id, $product_id, $quantity, $sn, $service_status, $bus_number, $automat_number, $storage_id, $product_name, $service_user_name);
	
	//dodanie rekordów do wygenerowania raportu (nie wchodzi w stan)
	$forward_devices->release_delivery($arrival_type_id, $product_name, $sn, $quantity2, $product_id, $document_name, $storage_id, $arrival_id);
	
	//dodanie stocka do przypisanego serwisanta
	$forward_devices->devices_fwd_on_serviceman($arrival_id, $product_id, $sn, $quantity2, $storage_id, $release_user_id, $document_name, $product_name, $release_user_name);
	*/
	
	/**TRANSACTION**/
	$forward_devices->forward_devices_TRANSACTION($arrival_id, $arrival_type_id, $product_id, $quantity, $quantity2, $sn, $service_status, $bus_number, $automat_number, $storage_id, $product_name, $service_user_name, $release_user_name, $release_user_id, $document_name);
}	
$forward_devices->update_arrival_forward_serviceman($arrival_id, $release_user_id);

?>