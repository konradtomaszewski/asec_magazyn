<?php
require('../../../config/db.class.php');
?>

<p><a href='#' id='back'>Back</a></p>
<?php
  echo "<H3 style='color:#000; font-weight:bold;' class='category_title'>".$articles->oneCategory(array(':id' => $_GET['category_id']))['name']."</H3>";
?>

<div class="grid-container">
<?php
foreach($articles->subCategory_serwisant($_GET['category_id']) as $row){
    echo "<div class='folder' category_id='".$row['id']."'>".$row['name']."</div>";
}
foreach($articles->indexArticleByCategory($_GET['category_id']) as $row){
    echo "<div class='files' article_id='".$row['id']."'>".$row['title']."</div>";
}
?>
</div>
