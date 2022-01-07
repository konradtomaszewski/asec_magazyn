<?php
require('../../../config/db.class.php');
print_r($_POST);

$storage_id = $_POST['storage_id'];

for($i=0; $i!=count($_POST['product_id']); $i++)
{
	if($_POST['damaged_devices_status'][$i]>0)
	{
		$service_user_id = $_POST['service_user_id'][$i];
		$product_id = $_POST['product_id'][$i];
		$sn = $_POST['sn'][$i];
		$bus_number = $_POST['bus_number'][$i];
		$automat_number = $_POST['automat_number'][$i];
		$datetime = $_POST['datetime'][$i];
		$damaged_devices_status = $_POST['damaged_devices_status'][$i];
		$damaged_devices_id = $_POST['damaged_devices_id'][$i];
		$service_request_id = $_POST['service_request_id'][$i];
	
		//do zmiany nr bocznego pojazdu i nr automatu
		$vectorsoft_magazyn->update_service_request($service_request_id, $bus_number, $automat_number);
	
		//aktualizacja statusu pobranych urządzeń z automatów
		$vectorsoft_magazyn->update_damaged_devices($product_id, $sn, $datetime, $damaged_devices_status, $storage_id, $service_user_id, $damaged_devices_id);
	}
}
?>