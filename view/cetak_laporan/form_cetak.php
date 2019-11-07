<?php
function bulan($aa){
	if($aa==1){
		return "Januari";
	}
	else if($aa==2){
		return "Februari";
	}
	else if($aa==2){
		return "Februari";
	}else if($aa==3){
		return "Maret";
	}else if($aa==4){
		return "April";
	}else if($aa==5){
		return "Mei";
	}else if($aa==6){
		return "Juni";
	}else if($aa==7){
		return "Juli";
	}else if($aa==8){
		return "Agustus";
	}else if($aa==9){
		return "September";
	}else if($aa==10){
		return "Oktober";
	}else if($aa==11){
		return "November";
	}
	else if($aa==12){
		return "Desember";
	}
}
?>
<div id="wb_form_cetak" style="position:absolute;left:179px;top:124px;width:538px;height:200px;z-index:10;">
<form name="Form2_bibit" method="post" action="control/cetak.php" enctype="multipart/form-data" id="form_cetak">
<label for="" id="Label1" style="position:absolute;left:16px;top:37px;width:115px;height:18px;line-height:18px;z-index:2;">Bulan</label>
<label for="" id="Label2" style="position:absolute;left:16px;top:80px;width:87px;height:18px;line-height:18px;z-index:3;">Tahun</label>
<input type="submit" id="Button1" onclick="window.location.href='index.php';return false;" name="" value="Cetak" style="position:absolute;left:16px;top:120px;width:51px;height:59px;z-index:4;">
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:153px;top:38px;width:265px;height:28px;z-index:5;">
	<?php
	for ($i=1900;$i<=2100;$i++){
		echo "<option value=".$i.">".$i."</option>";
	}
	?>
</select>
<select name="Combobox2" size="1" id="Combobox2" style="position:absolute;left:153px;top:79px;width:265px;height:28px;z-index:6;">
	<?php
	for ($j=1;$j<=12;$j++){
		echo "<option value=".$j.">".bulan($j)."</option>";
	}
	?>
</select>
</form>
</div>