<?php
require('../../../config/db.class.php');

$datetime = $_POST['datetime'];
$nr_tabor = $_POST['nr_tabor'];
$repair_devices_definitions_outofstorage = $_POST['repair_devices_definitions_outofstorage'];
$city = $_POST['city'];
$opis_awarii = $_POST['opis_awarii'];
$repair_status_id = '3'; 
for($i=0; $i!=count($_POST['sn']); $i++)
{	
	$sn = $_POST['sn'][$i];
	$naprawa_id = $vectorsoft_magazyn->add_device_repair_outofstorage($datetime, $nr_tabor, $sn, $repair_devices_definitions_outofstorage, $city, $opis_awarii,$repair_status_id);
	
	//utworzenie rekordu historii
	$description_history="Utworzono zgłoszenie dla urządzenia o numerze seryjnym: ".$sn;
	print_r($vectorsoft_magazyn->add_device_repair_outofstorage_history($naprawa_id, $description_history, $repair_status_id ));
}
?>