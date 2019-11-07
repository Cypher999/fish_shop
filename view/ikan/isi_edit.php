<?php
class simple_db_framework{
	//parameter dibawah ini boleh dirubah sesuai kebutuhan,kosongkan nilai dari variabel yang tidak dibutuhkan
	//this parameters below is changable if needed, empty the variable that you feel is useless
	public $table="ikan";//nama dari tabel * table's name
	public $identifier='kd_ikan';//field untuk identifikasi lokasi record *field to identify the record's location
	public $field=array('nm_ikan','hrg');//field yang ada didalam tabel kecuali identifier * fields inside table excluding identifier
	
	public $Host="localhost";//host of server *host dari server
	public $User="root";//username of server *username dari server
	public $Pass="";//password of server *password dari server
	public $Database="dbikan";//database of server *database dari server
	function setVal($val)//value yg ada dalam table(termasuk nilai variabel identifier), urutkan sesuai dengan variabel field (urutan pertama adalah nilai dari variabel identifier),pisahkan masing masing value dengan karakter +#+ * value inside table (including identifier's value),arrange the value according to the field (first sequence is the value of identifier),divide each value with +#+
	{
		$this->Value=$val;
	}
	//parameter dibawah adalah parameter pre-set, jangan dirubah kecuali jika anda melakukan modifikasi yang perlu
	//this parametrs below is pre-set parameters, dont change it unless you want to do necesary modification
	function __construct(){
		$this->conn=mysqli_connect($this->Host,$this->User,$this->Pass,$this->Database);
		$this->Value="";
	}
	function search_data($Value,$type){//gunakan property ini untuk mencari data, isi nilai parameter sesuai kebutuhan *use this property to search data, fill the necesary parameter 

	//jika nilai $Value=*, maka program akan mengambil seluruh nilai field yg ada di tabel,jika tidak, isikan sesuai dengan field yg akan dicari dlm tabel, isikan $type dengan selectAll untuk memilih semua data atau isikan dengan notAll untuk memilih sesuai dengan identifier,
	//if $value=*, program will take all value from the table, if not, fill the $Value with the field that will be taken from the table, fill $type with selectAll to select all data from table or notAll to select the data according to the $identifier
	$value_e=explode("+#+",$this->Value);
		if($type=="selectAll"){
			return mysqli_query($this->conn,"select ".$Value." from ".$this->table);	
		}
		else if($type=="notAll"){
		return mysqli_query($this->conn,"select ".$Value." from ".$this->table." where ".$this->identifier."='".$value_e[0]."'");	
		}
	}
	function __destruct(){
		mysqli_close($this->conn);
	}
}
$edit_ikan=new simple_db_framework();
$edit_ikan->setVal($_POST["kd"]);
$isi=$edit_ikan->search_data("*","notAll");
if(mysqli_num_rows($isi)>0){
	$isi_dt=mysqli_fetch_assoc($isi);
}
?>
<label for="" id="Label1" style="position:absolute;left:16px;top:37px;width:115px;height:18px;line-height:18px;z-index:8;">Nama Ikan</label>
<label for="" id="Label2" style="position:absolute;left:16px;top:74px;width:87px;height:18px;line-height:18px;z-index:9;">Harga</label>
<label for="" id="Label3" style="position:absolute;left:16px;top:148px;width:115px;height:18px;line-height:18px;z-index:10;">Gambar</label>
<input type="text" id="tnm_ikan" style="position:absolute;left:111px;top:41px;width:254px;height:16px;z-index:11;" name="tnm" value="<?php echo $isi_dt["nm_ikan"];?>" spellcheck="false">
<input type="text" id="thrg_ikan" style="position:absolute;left:111px;top:74px;width:254px;height:16px;z-index:12;" name="thrg" value="<?php echo $isi_dt["hrg"];?>" spellcheck="false">
<input type=file name="gbr_ikan" style="position:absolute;left:111px;top:147px;width:140px;height:140px;z-index:13;" onchange="preview('gbr_ikan_edit');">
<input type="hidden" name="kd_ikan" value="<?php echo $isi_dt["kd_ikan"];?>">
<div id="wb_gbr_ikan" style="position:absolute;left:111px;top:172px;width:140px;height:140px;z-index:13;">
<img src="control/file/<?php echo $isi_dt["kd_ikan"];?>.jpg" style="width:100px;height:100px;" id="gbr_ikan_edit" alt="gambar ikan"></div>
<input type="submit" id="simpan_ikan" name="edit_ikan" value="" style="position:absolute;left:16px;top:239px;width:60px;height:62px;z-index:14;" title="Simpan Perubahan">
<input type="button" id="close_ikan" onclick="document.getElementById('isi_edit').innerHTML='';ShowObjectWithEffect('wb_edit_ikan', 0, 'blindvertical', 500);Animate('tabel_ikan', '', '185', '', '', '', 500, '');return false;" name="" value="[ X ]" style="position:absolute;left:478px;top:9px;width:50px;height:32px;z-index:15;" title="Close">

