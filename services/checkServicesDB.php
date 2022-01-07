
<?php
require('../config/db.config.php');
require('../config/KLogger.php');
try
{
	$r = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASSW);
	echo "<script>
		$( document ).ready(function()
		{
			$('body').css('pointer-events','auto');
			//$('#main input').prop('disabled',false);
			$('#login_form_button').css('background-color','#3498db');
		});
		</script>";
	
}
catch(PDOException $e)
{
		$klogger = new KLogger($_SERVER['DOCUMENT_ROOT']."/mennica_magazyn/Logs/".date("Ymd")."/", date("Ymd")."_".date("H").".txt", KLogger::DEBUG);
		$klogger->LogFATAL( $e->getMessage());
		echo "<script>
		$( document ).ready(function()
		{
			$.notify('Błąd połączenia z bazą danych', 'error');
			$('body').css('pointer-events','none');
			//$('#main input').prop('disabled',true);
			$('#login_form_button').css('background-color','gray');
			$('#checkServicesDB').html('<p class=\'error\'>Błąd: Nie można nawiązać połączenia z sewerem bazy danych.</p>');
			$('p.error').css('display','block');
			$('p.error').css('border','1px solid red');
			$('p.error').css('border-radius','5px');
			$('p.error').css('background-color','#ffcbc1');
			$('p.error').css('padding','5px');
			$('p.error').css('color','red');
			$('p.error').css('font-size','12px');
			$('p.error').css('font-weight','bold');
			$('p.error').css('text-align','center');

		});
		</script>";
}
?>