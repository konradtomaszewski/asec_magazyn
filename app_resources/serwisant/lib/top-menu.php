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
	margin-top:-10px!important;
	text-align:center !important;
	align:center !important;
	font-size:80% !important;
}
</style>
					<header id="header" style="zoom:80%">
						<!--<h1><a href="#"> SERWISANT </a></h1>-->
						<h5><br /><a href="#"><?php echo $_SESSION['mennica_magazyn_user_name']?><p><b>VECTORSOFT</b></p></a></h5>
						<nav class="links">
							<ul>
								<li><a href="index.php">index</a></li>
								<li><a href="javascript:void(0)" onClick="window.location='service_request'">Działania serwisowe</a></li>
								<li><a href="javascript:void(0)" onClick="window.location='devices_for_return'">Urządzenia do zwrotu</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Szukaj</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								
								<li class="settings" style="width:4em">
									<a href="javascript:void(0)" onClick="window.location='settings'"><img class="settings"  src="assets/icons/settings.png"></a>
								</li>
							
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
				
					</header>

				