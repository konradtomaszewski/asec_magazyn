<?php
require('config/db.class.php');
?>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Urządzenia na stocku serwisanta</h3></div>
		</header>
		
		<section>
			<table id="table">
			<thead>
			<th>Serwisant</th>
			<th>Urządzenie</th>
			<th>Ilość</th>
			</thead>
			<tbody>
			<?php
				foreach($serviceman->serviceman_devices($_SESSION['mennica_magazyn_storage_id']) as $row)
				{
					echo "<tr><td>".$row['serwisant']."</td><td>".$row['product_name']."</td><td>".$row['quantity']."</td></tr>";
				}
			?>
			</tbody>
			</table>
		<span></span>
		</section>
	</article>

</div>