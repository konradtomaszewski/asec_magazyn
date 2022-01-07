<script> 
$(document).ready(function(){
	$("#sortTable").tablesorter();
});
</script>
<?php
require('../../../config/db.class.php');

$mennica_magazyn->warehouses($_POST['storage_id']);
?>