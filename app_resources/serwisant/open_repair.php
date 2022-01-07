<script>
$(document).ready(function(){
	$('#custom_repair_devices').load("app_resources/"+$.cookie('module')+"/lib/custom_repair_devices_form.php?repair_id=<?php echo $_POST['repair_id'];?>&damaged_devices_id=<?php echo $_POST['damaged_devices_id'];?>");
});
</script>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Naprawa urządzenia</h3></div>
		</header>
		<section>
			<div id="custom_repair_devices"></div>
		</section>
	</article>
</div>
