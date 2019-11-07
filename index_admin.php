<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="Untitled1.css" rel="stylesheet">
<link href="index_admin.css" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
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
<div id="wb_Form1" style="position:absolute;left:62px;top:4px;width:561px;height:121px;z-index:10;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<div id="wb_Heading1" style="position:absolute;left:12px;top:0px;width:461px;height:41px;z-index:0;">
<h1 id="Heading1">Kelompok Usaha Mandiri<br></h1></div>
<div id="wb_Heading2" style="position:absolute;left:12px;top:41px;width:461px;height:41px;z-index:1;">
<h2 id="Heading2">Desa Pulau Pandan<br></h2></div>
</form>
</div>
<div id="wb_Text1" style="position:absolute;left:74px;top:87px;width:577px;height:16px;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Rt.02 Pulau Pandan Kecamatan Bukit Kerman., Telp/Hp. 02379244319</span></div>
<div id="SlideMenu1" style="position:absolute;left:4px;top:125px;width:169px;height:140px;z-index:12;">
<ul role="menu">
   <li class="SlideMenu1_Folder" aria-haspopup="true"><a>ADMIN</a>
      <ul role="menu" aria-expanded="true">
         <li><a role="menuitem" href="">Data Ikan</a></li>
         <li><a role="menuitem" href="">Data Pesanan</a></li>
         <li><a role="menuitem" href="">Data User</a></li>
         <li><a role="menuitem" href="">Profil</a></li>
      </ul>
   </li>
</ul>
</div>

<?php include 'view/index_admin.php';?>
</body>
</html>