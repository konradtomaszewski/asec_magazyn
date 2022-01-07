<script type="text/javascript"> 
$(document).bind('keydown keypress', 'ctrl+s', function () {
    $('#save').click();
     return false;
});
$(document).ready(function() {
    
    document.addEventListener("contextmenu", function(e){
        e.preventDefault();
    }, false);

    function disableselect(e) {
        return false;
    }

    function reEnable() {
        return true;
    }

    document.onselectstart = new Function("return false");

    if (window.sidebar) {
        document.onmousedown = disableselect;
        document.onclick = reEnable;
    }

    $(window).keyup(function(e){
        if(e.keyCode == 44){
            $("body").hide();
        }
    });
}); 
</script>
<style>
.noselect {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<p><a href='#' id='show_category_content'>Back</a></p>
<?php
require('../../../config/db.class.php');
$read_article = $articles->oneArticle(array(':id' => $_GET['article_id']));


echo "<H3>".$read_article['title']."</H3><br />";
echo "<span class='noselect no-print'>".htmlspecialchars_decode($read_article['content'])."</span>";
?>

