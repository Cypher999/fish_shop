<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Menu Profil</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="css/Untitled1.css" rel="stylesheet">
<link href="css/profil.css" rel="stylesheet">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/wwb14.min.js"></script>
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
   <?php if ($_SESSION["id_user_ikan"]!="US-1"):?>
   ShowObject('wb_form_nama', 0);
   ShowObject('wb_form_pass', 0);
   <?php else:?>
      ShowObject('wb_form_pass', 1);
   <?php endif;?>
});
</script>
</head>
<body >
<?php include 'view/header.php';?>
<?php include 'view/slidemenu.php';?>
<?php if ($_SESSION["id_user_ikan"]!="US-1"):?>
<?php include 'view/profil/ganti_nama.php';?>
<?php include 'view/profil/menu.php';?>
<?php endif;?>
<?php include 'view/profil/ganti_password.php';?>
</body>
</html>