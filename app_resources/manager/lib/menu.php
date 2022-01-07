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
		<li class="menu">
			<h3><span onClick="window.location='index.php'"><a>Start</a></span></h3>
		</li>

		<li class="menu">
			<h3><span><a href="#">Użytkownicy</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='index.php?action=index'">Nowy użytkownik</a></li>
				<li><a onClick="window.location='index.php?action=users'">Zarządzaj użytkownikami</a></li>
			</ul>
		</li>	
		
		<li class="menu">
			<h3><span><a href="#">System</a></span></h3>
			<ul class="submenu">
				<li><a onClick="window.location='index.php?action=logs'">Logi zdarzeń</a></li>
			</ul>
		</li>
		
	</ul>

	<section style="background-color:#f4f4f4;">
		<ul class="actions vertical">
			<li><a href="#" onClick="window.location='index.php?action=logout'" class="button big fit" style="background-color:#fff">Wyloguj</a></li>
		</ul>
	</section>
</section>