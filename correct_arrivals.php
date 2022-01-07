<?php
$polaczenie = @new mysqli('localhost', 'kondzik', 'cieszyryjek', 'mennica_magazyn');
if (!$polaczenie) {
    die("Connection failed: " . mysqli_connect_error());
}
$start = 885;
$stop = $start + 835;



$i=1;
	for($x=$start;$x<=$stop;$x++)
	{
		if($i < 10)
		{
			$old = '0'.$i++;
			$new = $x;
			//echo $old.' '.$new.'<br />';
			$old_document_name = 'WAR/WYD/'.$old.'/2020';
			$new_document_name = 'WAR/WYD/'.$new.'/2020';
			
			$sql = "UPDATE arrivals SET document_name='$new_document_name' WHERE document_name='$old_document_name' AND storage_id='1' AND arrival_type_id='2' AND ID>'40717'";
			//echo $sql.'<br />';
			
			$polaczenie->query($sql);
		}
		else{
			$old = $i++;
			$new = $x;
			//echo $old.' '.$new.'<br />';
			$old_document_name = 'WAR/WYD/'.$old.'/2020';
			$new_document_name = 'WAR/WYD/'.$new.'/2020';
			
			$sql = "UPDATE arrivals SET document_name='$new_document_name' WHERE document_name='$old_document_name' AND storage_id='1' AND arrival_type_id='2' AND ID>'40717'";
			//echo $sql.'<br />';
			$polaczenie->query($sql);
		}
	}
	
?>