<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="css/Untitled1.css" rel="stylesheet">
<link href="css/pesan.css" rel="stylesheet">
<script src="js/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function()
{
   $(".SlideMenu1_Folder a").click(function()
   {
      var $popup = $(this).parent().find('ul');
      if ($popup.is(':hidden'))
      {
         $popup.show();
         $popup.attr('aria-expanded', 'true');
      }
      else
      {
         $popup.hide();
         $popup.attr('aria-expanded', 'false');
      }
   });
});
function hitung_jumlah(){
   document.getElementsByClassName('total_harga')[0].innerHTML=parseInt(document.getElementById('Label5').innerHTML)*parseInt(document.getElementById('Editbox1').value);
}
</script>
</head>
<body>
<?php include 'view/header.php';?>
<?php include 'view/slidemenu.php';?>
<?php include 'view/pesan/pesan.php';?>

</body>
</html>