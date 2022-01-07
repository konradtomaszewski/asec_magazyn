<?php
require('../../../config/db.class.php');
?>
<div class="grid-container">
<?php
foreach($articles->indexCategory() as $row){
    echo "<div class='folder' category_id='".$row['id']."'>".$row['name']."</div>";
}
?>
</div>