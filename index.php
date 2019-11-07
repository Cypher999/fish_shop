<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>USAHA MANDIRI</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="css/Untitled1.css" rel="stylesheet">
<?php if (empty($_SESSION["id_user_ikan"])):?>
<link href="css/index.css" rel="stylesheet">
<?php else:
	if($_SESSION["id_user_ikan"]=="US-1"):?>
<link href="css/index.css" rel="stylesheet">
<link href="css/index_admin.css" rel="stylesheet">
<link href="css/ikan.css" rel="stylesheet">
	<?php else:?>
		<link href="css/index.css" rel="stylesheet">
		<link href="css/ikan.css" rel="stylesheet">
<?php endif;endif;?>
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/wwb14.min.js"></script>
<script>
$(document).ready(function()
{
   ShowObject('wb_form_signup', 0);
});
</script>
</head>
<body >
<?php include 'view/header.php';?>
<?php
if (empty($_SESSION["id_user_ikan"])):
	include 'view/index/login.php';
	include 'view/index/signup.php';
	include 'view/index/daftar_produk.php';
?>
<input type="button" id="btn_open" onclick="ShowObjectWithEffect('btn_daftar', 0, 'dropright', 500);ShowObjectWithEffect('Label4', 0, 'dropright', 500);ShowObjectWithEffect('wb_form_signup', 1, 'dropright', 500);ShowObjectWithEffect('wb_form_login', 0, 'dropright', 500);return false;" name="" value="Disini" style="position:absolute;left:170px;top:305px;width:95px;height:32px;z-index:38;">
<label for="" id="Label4" style="position:absolute;left:1px;top:308px;width:171px;height:18px;line-height:18px;z-index:39;">Belum punya akun? daftar</label>
<?php else:
	include 'view/slidemenu.php';
	if($_SESSION["id_user_ikan"]!="US-1"):
		include 'view/index/daftar_produk.php';		
	else:
		include 'view/index/index_admin.php';
	endif;endif;
?>




</body>
</html>