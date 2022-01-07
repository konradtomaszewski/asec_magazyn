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
<section id="menu"  style="zoom:85%">
	<ul id="menu-2">
		<li class="menu"><h3><span onClick="window.location='index.php'"><a>Start</a></span></h3></li>
		<li class="menu">
			<h3><span><a href="#">Urządzenia</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='index.php?action=product_definitions'">Definicje urządzeń</a></li>
				<li><a onClick="window.location='index.php?action=manage_products'">Dodaj lub edytuj</a></li>
				<!--<li><a onClick="window.location='index.php?action=broken_devices'">Zatwierdź uszkodzone urządzenia</a></li>-->
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Magazyn</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='index.php?action=new_delivery'">Utwórz dostawę</a></li>
				<li><a onClick="window.location='index.php?action=correct_delivery_temp'">Korekta dostawy</a></li>
				<li><a onClick="window.location='index.php?action=warehouses'">Stany magazynowe</a></li>

			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Serwis</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='index.php?action=broken_devices'">Przyjmij uszkodzone urządzenia</a></li>
			</ul>
		</li>
		<li class="menu">
			<h3><span><a href="#">Raporty</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='index.php?action=delivery_details'">Szczegóły dostawy</a></li>
				<li><a onClick="window.location='index.php?action=delivery_report'">Raport z dostaw</a></li>
				<li><a onClick="window.location='index.php?action=report_broken_devices'">Raport uszkodzonych urządzeń</a></li>
				<li><a onClick="window.location='index.php?action=report_devices'">Raport ilościowy urządzeń</a></li>
			</ul>
		</li>
		
	</ul>

	<section style="background-color:#f4f4f4;">
		<ul class="actions vertical">
			<li><a href="#" onClick="window.location='index.php?action=logout'" class="button big fit" style="background-color:#fff">Wyloguj</a></li>
		</ul>
	</section>
</section>