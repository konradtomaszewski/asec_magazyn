<?php
require('config/db.class.php');

$user->switchServicemanUserToManager();
//header('Location: index');
?>
<script>
window.location.href ="index.php";
</script>