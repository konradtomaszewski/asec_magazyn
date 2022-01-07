<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#device_repair_outofstorage').load("app_resources/"+$.cookie('module')+"/lib/device_repair_outofstorage_list.php");

	$('#add_repair').click(function(){
		$('#add_device_repair_outofstorage_form').load("app_resources/"+$.cookie('module')+"/lib/add_device_repair_outofstorage_form.php");
		$('#add_repair').hide();
		$('#device_repair_outofstorage').hide();
	});
});
</script>


<div id="main" >
	<article class="post">
		<header>
			<div class="title"><h3>Naprawy spoza magazynu</h3></div>
		</header>
		<section>
			<button id="add_repair" style="float:right; margin-bottom:50px; background-color:#66FF66; border:1px solid #000">Dodaj naprawe</button>
			<div id="add_device_repair_outofstorage_form" ></div>
			
			<div id="device_repair_outofstorage"></div>

		</section>
	</article>
</div>


