<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#damaged_devices_form').load("app_resources/"+$.cookie('module')+"/lib/damaged_devices_form.php");
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
			<div class="title"><h3>Zarządzaj urządzeniami pobranymi z automatów</h3></div>
			
		</header>
		<section>
	
		<div id="damaged_devices_form"></div>
		</section>
	</article>

</div>
					
