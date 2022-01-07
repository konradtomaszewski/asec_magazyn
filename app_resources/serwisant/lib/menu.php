<?php
$user_id = $_SESSION['mennica_magazyn_user_id'];
$user_storage_id = $_SESSION['mennica_magazyn_storage_id'];
$baza_wiedzy_denied_users_id = array('96');
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
<section id="menu" style="zoom:85%">
	<ul id="menu-2">
		<li class="menu"><h3><span onClick="window.location='index.php'"><a>Start</a></span></h3></li>
		<li class="menu">
			<h3><span><a href="#">Serwis</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='service_request'">Działania serwisowe</a></li>
				<li><a onClick="window.location='my_devices'">Moje urządzenia</a></li>
				<li><a onClick="window.location='delivery_released'">Pobierz urządzenia</a></li>
				<li><a onClick="window.location='devices_for_return'">Urządzenia do zwrotu</a></li>
				<li><a onClick="window.location='history'">Historia działań</a></li>
			</ul>
		</li>	
	<?php if($user_id=='3' OR $user_id=='28' OR $user_id=='31' OR $user_id=='61' OR $user_id=='81'){?>
		<li class="menu">
			<h3><span><a href="#">Naprawy</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='devices_for_repair'">Urządzenia do naprawy</a></li>
				<li><a onClick="window.location='my_devices_for_repair'">Moje naprawy</a></li>
				<li><a onClick="window.location='device_repair_history'">Historia napraw</a></li>
			</ul>
		</li>	
	<?php }?>
	<?php if($user_storage_id=='2' OR $user_storage_id=='666'){?>
		<li class="menu">
			<h3><span><a href="#">Działania spoza magazynu</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='device_repair_outofstorage'">Urządzenia w naprawie</a></li>
			</ul>
		</li>
	<?php }?>
	<?php if(!in_array($user_id,$baza_wiedzy_denied_users_id)){?>
		<li class="menu">
			<h3><span><a onClick="window.location='baza_wiedzy'">Baza wiedzy</a></span></h3>
		</li>
	<?php }?>	
		<li class="menu">
			<h3><span style="background-color:#FF6D6A" onClick="window.location='switchServicemanUserToManager'">Przełącz na managera</span></h3>
		</li>	
	</ul>

	<div style="background-color:#f4f4f4; position:absolute; bottom:0px; width:100%">
		<ul class="actions vertical">
			<li><a href="#" onClick="window.location='logout'" class="button big fit" style="background-color:#fff">Wyloguj</a></li>
		</ul>
	</div>
</section>