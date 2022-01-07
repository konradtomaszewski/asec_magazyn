<?php
require('../../../config/db.class.php');
$document_number = trim($_POST['document_number']);
$vectorsoft_magazyn->getTempDeliveryItems($document_number)

?>