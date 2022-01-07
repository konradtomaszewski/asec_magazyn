<?php 
ini_set('session.gc_maxlifetime', 8*60*60); //8godzin
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
session_start();

error_reporting(1);
if(empty($_SESSION['mennica_magazyn_login']) OR !isset($_SESSION['mennica_magazyn_login']))
{
	header("Location:login.php");
	//die;
}
?>
<!DOCTYPE HTML PUBLIC "-//W4C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<title>Aplikacja zarządzająca</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/preloader.css" />
		<link rel="stylesheet" href="assets/css/no-mobile.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/formoid-metro-cyan.css" type="text/css" />
		<link href="assets/css/featherlight.min.css" type="text/css" rel="stylesheet" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<script src="assets/js/screen.js"></script>
		
		
		<!--<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
		<script   src="assets/js/jquery-ui.js"></script>
		<link rel="stylesheet" href="assets/css/jquery-ui.css">-->
		

		
		
		<script  src="assets/js/jquery-1.12.4.js"></script>
		<script  src="assets/js/jquery.table2excel.js"></script>
		<script src="assets/js/jquery-ui.js"></script>
		<link rel="stylesheet" href="assets/css/jquery-ui.css" />
		
		<script   src="assets/js/datepicker-pl.js"></script>
		
		<script   src="assets/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" href="assets/css/jquery.dataTables.css" />
		
		<script   src="assets/js/jquery.tablesorter.js"></script>
		<link rel="stylesheet" href="assets/css/sortTable.css" />
		
		<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
		
		<!-- datatime picker-->
		<script   src="assets/js/jquery.datetimepicker.full.js"></script>
		<link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css" />
		
		<script src="assets/js/featherlight.js" type="text/javascript" charset="utf-8"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
		
		
		
		
	</head>
	<body>
	<div id="preloader">
		<div id="status"></div>
		
	</div>
<div id="checkServicesDB"></div>
	<div id="wrapper">
		
		<?php
			if(isset($_SESSION['mennica_magazyn_user_id']))
			{
				$module = $_SESSION['mennica_magazyn_module'];
				if(!empty($module))
				{
					setcookie("module", $module);
					
					include('app_resources/'.$module.'/lib/top-menu.php');
					include('app_resources/'.$module.'/lib/menu.php');
				
					
					if(!empty($_GET['action'])) { 
						if(is_file("app_resources/".$module."/".$_GET['action'].".php")) include "app_resources/".$module."/".$_GET['action'].".php"; 
						else echo "<br />Nie ma takiej strony :-("; 
					} 
					else include "app_resources/".$module."/index.php";
				}
			}
		?>
	</div>
	<script src="assets/js/sweetalert.min.js">
	<script src="assets/js/jquery-3.3.1.slim.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="assets/js/Duplicate.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		
		console.log('%cOstrzeżenie!\n\nTa funkcjonalność jest przeznaczona dla twórcy systemu.\nKorzystanie z niej może narazić Ciebie na atak Self-XSS.\nNie wklejaj i nie używaj żadnego kodu w tej konsoli. ', 'background: #fff; color: red; font-size:14px; font-weight:bold');
		
		$("#checkServicesDB").load("services/checkServicesDB.php");
		setInterval(function() {
			$("#checkServicesDB").load("services/checkServicesDB.php");
		},5500);
		
		$('#table').DataTable();

		$(window).load(function() {
			$('#status').fadeOut();
			$('#preloader').delay(50).fadeOut('slow');
			$('body').delay(10).css({'overflow':'visible'});

			if (window.IsDuplicate()) {	
				swal({
					title: "Wykryto otwarcie kolejnej karty" ,  
					text: "System pozwala na pracę tylko w jednej karcie. \n\n Proszę o zamknięcie pozostałych." ,  
					icon: "error",
					buttons: false,
					closeOnClickOutside: false,
				});
				/*blokada działania aplikacji i alert na wypadek włączonego adblocka*/
				$('body').css('pointer-events','inherit');
				$('body').css('pointer-events','none');
				$(document).click(function(){alert('System pozwala na pracę tylko w jednej karcie. \n Proszę o zamknięcie pozostałych.'); });
			}
		});
		
		
	});
	</script>
	<script src="assets/js/notify.js"></script>
	</body>
</html>
