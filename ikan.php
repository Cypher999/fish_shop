<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data Ikan</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<link href="css/Untitled1.css" rel="stylesheet">
<link href="css/ikan.css" rel="stylesheet">
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
});
function preview(isi_gambar){
   var isi_gbr=document.getElementById(isi_gambar);
   isi_gbr.src=URL.createObjectURL(event.target.files[0]);
}
function load_table(){
   var isi=new XMLHttpRequest();
   isi.onreadystatechange=function(){
      if(this.readyState==4&&this.status==200){
         document.getElementById('tabel_ikan').innerHTML=this.responseText;
      }
   };
   isi.open('post','view/ikan/data.php',true);
   isi.send();
}
function edit(kd){
   var isi=new XMLHttpRequest();
   isi.onreadystatechange=function(){
      if(this.readyState==4&&this.status==200){
         document.getElementById('isi_edit').innerHTML=this.responseText;
      }
   };
   isi.open('post','view/ikan/isi_edit.php',true);
   isi.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   isi.send("kd="+kd);
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
<body onload="load_table();ShowObject('wb_form_ikan', 0);ShowObject('wb_edit_ikan', 0);ShowObject('wb_cari_ikan', 0);return false;">
<?php include 'view/header.php';?>
<?php include 'view/slidemenu.php';?>
<table style="position:absolute;left:208px;top:183px;width:701px;height:203px;z-index:21;" id="tabel_ikan"></table>
<?php include 'view/ikan/search.php'; ?>
<?php include 'view/ikan/edit.php'; ?>
<input type="button" id="tambah_ikan" onclick="ShowObjectWithEffect('wb_form_ikan', 1, 'blindvertical', 500);ShowObjectWithEffect('wb_cari_ikan', 0, 'blindvertical', 500);Animate('tabel_ikan', '', '510', '', '', '', 500, '');return false;" name="" value="" style="position:absolute;left:208px;top:121px;width:60px;height:62px;z-index:22;" title="tambah data baru">
<input type="button" id="cari_ikan" name="" onclick="ShowObjectWithEffect('wb_cari_ikan', 1, 'blindvertical', 500);ShowObjectWithEffect('wb_edit_ikan', 0, 'blindvertical', 500);ShowObjectWithEffect('wb_form_ikan', 0, 'blindvertical', 500);Animate('tabel_ikan', '', '310', '', '', '', 500, '');return false;" value="" style="position:absolute;left:277px;top:121px;width:60px;height:62px;z-index:23;" title="cari data">
<?php include 'view/ikan/new.php';?>
</body>
</html>