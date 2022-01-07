<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#my_devices_for_repair').load("app_resources/"+$.cookie('module')+"/lib/my_devices_for_repair_form.php");
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
			<div class="title"><h3>Moje urządzenia do naprawy</h3></div>
			
		</header>
		<section>
	
		<div id="my_devices_for_repair"></div>
		</section>
	</article>

</div>
					
