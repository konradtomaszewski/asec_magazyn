<?php
$user_id = $_SESSION['mennica_magazyn_user_id'];
$user_storage_id = $_SESSION['mennica_magazyn_storage_id'];
?>
<script src="assets/js/lazeemenu-jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#menu-2').lazeemenu();
    });
</script>
<style>
li{
	list-style-type:none;
}

#menu-2{
	min-height:30em;
}

#menu-2 .submenu{
	margin-bottom:5px;
}

#menu-2 span{
	display:block;
	border:1px solid #ddd;
	color:#555;
	font-size:0.8em;
	min-height: 4em;
	text-align:center;
	padding:1.2em;
	cursor:pointer;
}

#menu-2 li a{
	cursor:pointer;
}

#menu-2 span:hover{
	border:1px solid #2EC0C9;
	color: #2EC0C9;
}
li.menu>h3{
	font-size:90% !important;
}
</style>
<section id="menu" style="zoom:85%;">
	<ul id="menu-2">
		<li class="menu"><h3><span onClick="window.location='.'"><a>Start</a></span></h3></li>
		<li class="menu">
			<h3><span><a href="#">Urządzenia</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='product_definitions'">Definicje urządzeń</a></li>
				<li><a onClick="window.location='manage_products'">Dodaj lub edytuj</a></li>
				<!--<li><a onClick="window.location='index.php&action=broken_devices'">Zatwierdź uszkodzone urządzenia</a></li>-->
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Dostawy</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='new_delivery'">Utwórz dostawę</a></li>
				<li><a onClick="window.location='correct_delivery_temp'">Korekta dostawy</a></li>
				<li><a onClick="window.location='accept_delivery_temp'">Przyjmij dostawę na magazyn</a></li>
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Magazyn</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='accept_delivery_temp'">Przyjmij dostawę na magazyn</a></li>
				<li><a onClick="window.location='delivery_released'">Wydaj z magazynu</a></li>
				<li><a onClick="window.location='devices_for_return'">Zwrot do magazynu</a></li>
				<li><a onClick="window.location='warehouse'">Stan magazynowy</a></li>
				
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Pobrane urządzenia z automatów</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='damaged_devices'">Urządzenia pobrane z automatów</a></li>
				<li><a onClick="window.location='damaged_devices_paper'">Papier pobrany z automatów</a></li>
				<li><a onClick="window.location='repair_devices'">Urządzenia w naprawie</a></li>
				<li><a onClick="window.location='transfer_to_mennica_service'">Urządzenia uszkodzone</a></li>	
				<li><a onClick="window.location='repair_devices_external_service'">Urządzenia w naprawie serwis zew.</a></li>
				<li><a onClick="window.location='transfer_to_storage'">Przekaż na magazyn</a></li>
					
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Raporty</a></span></h3>
			<ul class="submenu">
				<!--<li><a onClick="window.location='delivery_details'">Szczegóły dostawy/wydania</a></li>-->
				<li><a onClick="window.location='report_delivery_details'">Informacje o dokumentach magazynowych</a></li>
				<!--<li><a onClick="window.location='report_broken_devices'">Raport uszkodzonych urządzeń</a></li>-->
				<li><a onClick="window.location='report_serviceman_devices'">Raport urządzeń serwisantów</a></li>
				<li><a onClick="window.location='report_repair_devices'">Raport z napraw urządzeń</a></li>
				<li><a onClick="window.location='report_devices_to_external_service'">Raport napraw serwis zew.</a></li>
				<li><a onClick="window.location='report_utilize_devices'">Raport z utylizacji</a></li>
				<li><a onClick="window.location='report_device_permanent_service_request'">Raport stały montaż</a></li>
				<!--<li><a onClick="window.location='device_repair_history'">Historia napraw urządzeń</a></li>-->
				<li><a onClick="window.location='report_history_devices'">Historia urządzenia</a></li>
				<!--<li><a onClick="window.location='report_devices_from_mpsa'">Urządzenia otrzymane od MPSA</a></li>-->
				
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Działania spoza magazynu</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='device_repair_outofstorage_definitions'">Definicje urządzeń do napraw</a></li>
				<li><a onClick="window.location='device_repair_outofstorage'">Urządzenia w naprawie</a></li>
				<li><a onClick="window.location='report_device_repair_outofstorage'">Raport napraw poza magazynem</a></li>
			</ul>
		<li class="menu">
			<h3><span style="background-color:yellow"><a href="#">Baza wiedzy</a></span></h3>
			<ul class="submenu">
				<!--<li><a onClick="window.location='baza_wiedzy_admin'">Panel administratora</a></li>-->
				<li><a onClick="window.location='baza_wiedzy'">Widok serwisanta</a></li>	
			</ul>
		</li>
		<li class="menu">
			<h3><span style="background-color:#FF6D6A" onClick="window.location='switchManagerUserToServiceman'">Przełącz na serwis</span></h3>
		</li>
		</li>
		<?php if($user_id=='37'){?>
		<li class="menu">
			<h3><span><a href="#">Administrator</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='adm_new_user'">Nowy użytkownik</a></li>
				<li><a onClick="window.location='adm_users_list'">Zarządzaj użytkownikami</a></li>
				<li><a onClick="window.location='adm_system_logs'">Logi zdarzeń</a></li>
			</ul>
		</li>
		<?php }?>
	</ul>
	<div style="background-color:#f4f4f4; position:absolute; bottom:0px; width:100%">
		<ul class="actions vertical">
			<li><a href="#" onClick="window.location='logout'" class="button big fit" style="background-color:#fff">Wyloguj</a></li>
		</ul>
	</div>
</section>
