<?php
require('config/db.class.php');
$count_items_warn = "5";
?>

<script> 
$(document).ready(function(){
	$("#sortTable").tablesorter();
});
</script>

<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Monitor magazynu</h3></div>
		</header>
		<section>
		<?php
			echo "<h4>Sekcja informująca o niskiej ilości urządzeń w magazynie.<br />
				Aktualnie ustawiona minimalna ilość urządzenia przy której pojawi się poniższe powiadomienie to: ".$count_items_warn." szt.</h4><br /><br />";
		
			$dashboard->custom_storage_warn($count_items_warn, $_SESSION['mennica_magazyn_storage_id']);
		?>
		</section>
	</article>
</div>

					
					