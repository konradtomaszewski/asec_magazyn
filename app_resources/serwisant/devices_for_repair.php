<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#devices_for_repair').load("app_resources/"+$.cookie('module')+"/lib/devices_for_repair_form.php");
});
</script>

<style>
select{
	width:15em;
	padding-left:10px;
}
input{
	padding-left:10px;
}
th{
	cursor:pointer;
}
#btn{
	float:right;
	width:10em;
}
</style>
<div id="main">
		
	<article class="post">
		<header>
			<div class="title"><h3>Wybierz urządzenie do naprawy</h3></div>
			
		</header>
		<section>
	
		<div id="devices_for_repair"></div>
		</section>
	</article>

</div>
					
