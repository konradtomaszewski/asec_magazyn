<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#add_device').click(function(){
		$('#add_device_definitions_outofstorage_form').load("app_resources/"+$.cookie('module')+"/lib/add_device_definitions_outofstorage_form.php");
		$('#add_device').hide();
	});	
	
	$('.change_device_name').each(function(){
		$(this).html('Zmień nazwę');
		$(this).css('float','left');
		$(this).css('cursor','pointer');
		$(this).css('padding-right','20px');
	}).click(function(){
		var device_id = $(this).attr('device_id');
		$('#add_device').hide();
		$('#edit_device_definitions_outofstorage_form').load("app_resources/"+$.cookie('module')+"/lib/edit_device_definitions_outofstorage_form.php?device_id="+device_id);
		//alert(device_id);
	});
	
	$('.deactivation_device').each(function(){
		$(this).html('Dezaktywuj');
		$(this).css('color','red');
		$(this).css('float','left');
		$(this).css('cursor','pointer');
	}).click(function(){
		var device_id = $(this).attr('device_id');

		//alert(device_id);
	});
});
</script>

<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Definicje urządzeń do napraw spoza magazynu</h3></div>
		</header>
		<section>
			<!--kontener na formularz dodawania urządzenia-->
			<div id="add_device_definitions_outofstorage_form"></div>
			<!--kontener na formularz edycji urządzenia-->
			<div id="edit_device_definitions_outofstorage_form"></div>
			
			<h3>Lista urządzeń</h3>
			<button id="add_device" style="background-color:#66FF66; border:1px solid #000; float:right;width:250px;">Dodaj urządzenie</button>
			<table>
			<thead>
			<th>Typ urządzenia</th>
			<th>Nazwa urządzenia</th>
			<th>Operacje</th>
			</thead>
			<tbody>
			<?php
			foreach($vectorsoft_magazyn->device_repair_definitions_outofstorage_list() as $row)
			{
				echo "<tr><td>".$row['type']."</td><td>".$row['name']."</td><td>
										<div class='change_device_name' device_id='".$row['id']."'></div>
										<div class='deactivation_device' device_id='".$row['id']."'></div>
					</td></tr>";
			}
			?>
			</tbody>
			</table>
		</section>
	</article>
</div>