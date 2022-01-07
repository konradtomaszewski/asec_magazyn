<style>
pre {
    font-size: 0.7em;
    font-family: arial;
    font-style: normal;
	overflow:auto;
	max-width:100%
}
</style>
<?php

echo "<pre>";
echo file_get_contents("../../../".$_POST['read_log_file']);
echo "</pre>";
?>