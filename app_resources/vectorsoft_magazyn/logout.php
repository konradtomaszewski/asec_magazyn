<?php
error_reporting(0);
unset($_SESSION['mennica_magazyn_user_id']);
unset($_SESSION['mennica_magazyn_user_id']);
unset($_SESSION['mennica_magazyn_login']);
unset($_SESSION['mennica_magazyn_module']);
$_SESSION = array();

if (isset($_COOKIE[session_name()])) { 
   setcookie(session_name(), '', time()-42000, '/'); 
}
unset($_COOKIE[session_name()]);
session_unset();  
session_destroy();  
?>
<script>
window.location = "index.php";
</script>