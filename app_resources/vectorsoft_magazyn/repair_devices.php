<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#repair_devices_form').load("app_resources/"+$.cookie('module')+"/lib/repair_devices_form.php");
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
			<div class="title"><h3>Urzadzenia w naprawie</h3></div>
			
		</header>
		<section>
	
		<div id="repair_devices_form"></div>
		</section>
	</article>

</div>
					
