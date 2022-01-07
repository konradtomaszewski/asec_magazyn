<?php
require('../../../config/db.class.php');

$arrival_id= $_POST['arrival_id'];
$arrival_type_id='6'; //przyjêto w serwisie
$product_status_id = '4'; //w serwisie mennicy

//zdjêcie rekordu z broken_arrival_items
$mennica_magazyn->accept_broken_arrival_items($arrival_id, $arrival_type_id);

//update arrival accept broken devices
$mennica_magazyn->accept_arrival_broken_devices($arrival_id);

/*
for($i=0; $i!=count($_POST['product_id']); $i++)
{
	$product_id = $_POST['product_id'][$i];
	$quantity = 0-$_POST['quantity'][$i];
	$arrival_id= $_POST['arrival_id'];
	$storage_id = $_POST['storage_id'];

	//$mennica_magazyn->accept_broken_arrival_items($product_id, $quantity, $arrival_id, $arrival_type_id, $storage_id);
	//zdjêcie rekordu z broken_product_details
	//$mennica_magazyn->accept_broken_product_details($product_id, $arrival_id, $storage_id, $product_status_id);
}
*/
?>