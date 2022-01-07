<?php
require('config/db.class.php');
?>
<style>
select{
	width:15em;
	padding-left:10px;
}

</style>
<script>
$(document).ready(function(){
		$('#warehauses_list').change(function(){
			var storage_id = $(this).val();
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/warehouses_process.php",
					type: "POST",
					data: "storage_id="+storage_id,
					success: function(data) {
						$("#warehouses_results").html(data);		
					},
					error: function(data){
						$.notify('Błąd pobierania danych', 'error');
					}
			});
		});

});
</script>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Stany magazynów</h3></div>
		</header>
		<section>
		<h4>Wybierz magazyn z listy</h4>
			<select id="warehauses_list">
					<option selected disabled value=''>Wybierz z listy</option>
				<?php
				foreach($mennica_magazyn->getStorageList() as $row)
				{
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
				?>
			</select>
			<br /><br />
			<div id="warehouses_results"></div>
			<span></span>
		</section>
	</article>
</div>