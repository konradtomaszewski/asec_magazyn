<style>
.settings{
	background-image:url('assets/icons/settings.png');
	background-size: 35px 35px;
	background-repeat: no-repeat;
	background-position: center; 
}
a{
	cursor:pointer;
	height:56px !important;
}
h4{
	padding-left:20px !important;
	text-align:center !important;
	align:center !important;
}
#header>h5{
	margin-left:20px;
	margin-top:-15px!important;
	text-align:center !important;
	align:center !important;
	font-size:95% !important;
}
</style>
<header id="header" style="zoom:80%">
	<!--<h1><a href="#">Vectorsoft</a></h1>-->
	<h5><br /><a href="#"><?php echo $_SESSION['mennica_magazyn_user_name']?><p><b>VECTORSOFT</b></p></a></h5>
	<nav class="links">
		<ul>
			<li><a href=".">Strona główna</a></li>
			<li><a onClick="window.location='accept_delivery_temp'">Przyjmij dostawę na magazyn</a></li>
			<li><a onClick="window.location='delivery_released'">Wydaj z magazynu</a></li>
			<!--<li><a onClick="window.location='devices_for_return'">Zwrot do magazynu</a></li>-->
			<li><a onClick="window.location='warehouse'">Stan magazynowy</a></li>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<!--<li class="search">
				<a class="fa-search" href="#search">Search</a>
				<form id="search" method="get" action="#">
					<input type="text" name="query" placeholder="Search" />
				</form>
			</li>-->
			
			<li class="settings" style="width:4em">
				<a href="javascript:void(0)" onClick="window.location='settings'"><img class="settings"  src="assets/icons/settings.png"></a>
			</li>
			
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>

				