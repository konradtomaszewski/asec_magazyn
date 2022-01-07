<?php
require('config/db.class.php');

$user->switchManagerUserToServiceman();
//header('Location: index');
?>
<script>
window.location.href ="index.php";
</script>