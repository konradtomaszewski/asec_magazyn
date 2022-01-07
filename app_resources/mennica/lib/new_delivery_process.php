<?php
require('../../../config/db.class.php');
$document_name = $_POST['document_name'];
//zapis dostawy do tabeli tymczasowej do czasu zatwierdzenia jej
for($i=0; $i!=count($_POST['item_name']); $i++)
{	
	if($_POST['item_product_id'][$i] == '')
	{
		$item_product_id = $vectorsoft_magazyn->getProduct_id($_POST['item_name'][$i]);
	}
	else
	{
		$item_product_id = $_POST['item_product_id'][$i];
	}
	
	$item_name = $_POST['item_name'][$i];
	$item_sn = $_POST['item_sn'][$i];
	$item_quantity = $_POST['item_quantity'][$i];
	//$item_product_id = $_POST['item_product_id'][$i];
	//$document_name = $_POST['document_name'];
	$storage_id = $_POST['storage_id'];
	$arrival_type_id = '1'; //dokument dostawy częśći prefix N
	
	$mennica_magazyn->arrivalProductsTemp($arrival_type_id, $item_name, $item_sn, $item_quantity, $item_product_id, $document_name, $storage_id);
	
}

//funkcja sprawdzająa czy do urządzenia przypisane zostało poprawne id urządzenia
$mennica_magazyn->verifyProductId_arrivalTemp($document_name);
//update arrival cache document_name
$document_name_generate->update_arrival_document_name_cache($document_name, $arrival_type_id, $storage_id);
?>