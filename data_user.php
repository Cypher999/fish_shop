<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data User</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="css/Untitled1.css" rel="stylesheet">
<link href="css/daftar_pesanan.css" rel="stylesheet">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/wb.rotate.min.js"></script>
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
   ShowObject('wb_Form2', 0);
   ShowObject('wb_Form3', 0);
});
function load_preview(abc){
   isi=new XMLHttpRequest();
   isi.onreadystatechange=function(){
      if(this.readyState==4&&this.status==200){
         document.getElementById("wb_Form2").innerHTML=this.responseText;
      }
   };
   isi.open("post","view/daftar_pesanan/isi_preview.php",true);
   isi.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   isi.send("kd_pesan="+abc);
}
function cari(){
   var isi_kode=($(".cari").val());
   var pj_kd=isi_kode.length;
   if(pj_kd==0){
      $(".isi_tabel").show();
   }
   else{
      $(".isi_tabel").hide();
      $("[id^="+isi_kode+"]").show();
   }
}
</script>
</head>
<body >
<?php include 'view/header.php';?>
<?php include 'view/slidemenu.php';?>
<?php include 'view/daftar_user/list.php';?>
<input type="button" id="cari_pesan" onclick="ShowObjectWithEffect('wb_Form3', 1, 'blindvertical', 500);ShowObjectWithEffect('wb_Form2', 0, 'blindhorizontal', 500);Animate('tabel_pesan', '', '325', '', '', '', 500, '');return false;" name="" value="" style="position:absolute;left:202px;top:124px;width:60px;height:62px;z-index:33;" title="cari data">
<?php include 'view/daftar_pesanan/search.php';?>
</body>
</html>