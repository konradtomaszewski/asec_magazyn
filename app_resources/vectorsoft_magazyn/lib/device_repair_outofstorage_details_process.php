<?php
require('../../../config/db.class.php');
print_r($_POST);

$start_repair_datetime = $_POST['start_repair_datetime'];
$nr_tabor = $_POST['nr_tabor'];
$sn = $_POST['sn'];
$naprawa_id = $_POST['naprawa_id'];
$typ_naprawy = $_POST['typ_naprawy'];
$serwis_zew = $_POST['serwis_zew'];
$repair_status_id = $_POST['repair_status'];
$diagnoza = $_POST['diagnoza'];
$repair_description = $_POST['repair_description'];
$real_time = $_POST['real_time'];

	//aktualizacja danych naprawy
	$vectorsoft_magazyn->update_device_repair_outofstorage($start_repair_datetime, $nr_tabor, $sn, $naprawa_id, $typ_naprawy, $serwis_zew, $repair_status_id, $diagnoza, $repair_description, $real_time);

	//utworzenie rekordu historii naprawy
	$description_history="
	Wykonane zmiany:<br />
	start_repair_datetime: ".$start_repair_datetime."<br />
	nr_tabor: ".$nr_tabor."<br />
	sn: ".$sn."<br />
	Typ naprawy: ".$typ_naprawy."<br />
	Serwis zewnętrzny: ".$serwis_zew."<br />
	Diagnoza: ".$diagnoza."<br />
	Wykonane czynności: ".$repair_description."<br />
	Czasochłonność: ".$real_time."<br />
	";
	$vectorsoft_magazyn->add_device_repair_outofstorage_history($naprawa_id, $description_history, $repair_status_id );
?>