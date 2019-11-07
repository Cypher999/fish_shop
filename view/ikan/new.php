<div id="wb_form_ikan" style="position:absolute;left:208px;top:183px;width:538px;height:317px;z-index:24;">
<form name="Form2_bibit" method="post" action="control/ikan.php" enctype="multipart/form-data" id="form_ikan">
<label for="" id="Label1" style="position:absolute;left:16px;top:37px;width:115px;height:18px;line-height:18px;z-index:8;">Nama Ikan</label>
<label for="" id="Label2" style="position:absolute;left:16px;top:74px;width:87px;height:18px;line-height:18px;z-index:9;">Harga</label>
<label for="" id="Label3" style="position:absolute;left:16px;top:148px;width:115px;height:18px;line-height:18px;z-index:10;">Gambar</label>
<input type="text" id="tnm_ikan" style="position:absolute;left:111px;top:41px;width:254px;height:16px;z-index:11;" name="tnm" value="" spellcheck="false">
<input type="text" id="thrg_ikan" style="position:absolute;left:111px;top:74px;width:254px;height:16px;z-index:12;" name="thrg" value="" spellcheck="false">
<input type=file name="gbr_ikan" style="position:absolute;left:111px;top:147px;width:140px;height:140px;z-index:13;" onchange="preview('gbr_ikan');">
<div id="wb_gbr_ikan" style="position:absolute;left:111px;top:172px;width:140px;height:140px;z-index:13;">
<img src="images.jpeg" id="gbr_ikan" alt="preview"></div>
<input type="submit" id="simpan_ikan" name="simpan_ikan" value="" style="position:absolute;left:16px;top:239px;width:60px;height:62px;z-index:14;" title="Simpan Data">
<input type="button" id="close_ikan" onclick="ShowObjectWithEffect('wb_form_ikan', 0, 'blindvertical', 500);Animate('tabel_ikan', '', '185', '', '', '', 500, '');return false;" name="" value="[ X ]" style="position:absolute;left:478px;top:9px;width:50px;height:32px;z-index:15;" title="Close">
</form>
</div>