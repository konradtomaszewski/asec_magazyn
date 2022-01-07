<?php
require('config/db.class.php');
?>
<div id="main">
		<article class="post">
			<header>
				<div class="title"><h3>Urządzenia do zwrotu</h3></div>
				
			</header>
			<section>
		
			<?php
			$x=1;
			foreach($serviceman->devices_for_return() as $row)
			{
				if($row['quantity'] > 0)
				{
					echo $x++.". ".$row['product_name']." ".$row['quantity']." szt.</br />";
				}
				
			}
			
			?>
								
			<span></span>
		</section>
		</article>
</div>