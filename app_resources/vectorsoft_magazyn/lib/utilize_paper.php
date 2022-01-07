<?php
require('../../../config/db.class.php');
$storage_id = $_SESSION['mennica_magazyn_storage_id'];
$vectorsoft_magazyn->utilize_paper($storage_id);