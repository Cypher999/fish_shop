<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cetak Laporan</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="css/Untitled1.css" rel="stylesheet">
<link href="css/ikan.css" rel="stylesheet">
<link href="css/cetak_laporan.css" rel="stylesheet">
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
</script>
</head>
<body>
<?php include 'view/header.php';?>
<?php include 'view/slidemenu.php';?>
<?php include 'view/cetak_laporan/form_cetak.php';?>

</body>
</html>