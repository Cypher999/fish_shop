<?php
class Ikan{
	//parameter dibawah ini boleh dirubah sesuai kebutuhan,kosongkan nilai dari variabel yang tidak dibutuhkan
	//this parameters below is changable if needed, empty the variable that you feel is useless
	public $table="ikan";//nama dari tabel * table's name
	public $identifier='kd_ikan';//field untuk identifikasi lokasi record *field to identify the record's location
	public $field=array();//field yang ada didalam tabel kecuali identifier * fields inside table excluding identifier
	
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
		if($type=="selectAll"){
			return mysqli_query($this->conn,"select ".$Value." from ".$this->table);	
		}
		else if($type=="notAll"){
			$value_e=explode("+#+",$this->Value);
			return mysqli_query($this->conn,"select ".$Value." from ".$this->table." where ".$this->identifier."='".$value_e[0]."'");	
		}
	}
	function __destruct(){
		mysqli_close($this->conn);
	}
}
$ikan=new Ikan();
$ikan->setVal($_POST["pesan"]);
$isi=mysqli_fetch_assoc($ikan->search_data("*","notAll"));
?>
<div id="wb_form_ikan" style="position:absolute;left:176px;top:121px;width:538px;height:363px;z-index:20;">
<form name="Form2_bibit" method="post" action="control/pesan.php" enctype="multipart/form-data" id="form_ikan">
<input type=hidden name=kd_ikan value="<?php echo $isi["kd_ikan"] ?>">
<label for="" id="Label1" style="position:absolute;left:16px;top:37px;width:115px;height:18px;line-height:18px;z-index:2;">Nama Ikan</label>
<label for="" id="Label2" style="position:absolute;left:16px;top:63px;width:87px;height:18px;line-height:18px;z-index:3;">Harga</label>
<label for="" id="Label3" style="position:absolute;left:16px;top:140px;width:115px;height:18px;line-height:18px;z-index:4;">Nama pemesan</label>
<input type="submit" id="simpan_ikan" name="" value="" style="position:absolute;left:16px;top:278px;width:60px;height:62px;z-index:5;" title="Pesan">
<label for="" id="Label4" style="position:absolute;left:128px;top:37px;width:115px;height:18px;line-height:18px;z-index:6;"><?php echo $isi["nm_ikan"] ?></label>
<label for="" id="Label5" style="position:absolute;left:128px;top:63px;width:87px;height:18px;line-height:18px;z-index:7;"><?php echo $isi["hrg"] ?></label>
<label for="" id="Label6" style="position:absolute;left:16px;top:176px;width:115px;height:18px;line-height:18px;z-index:8;">Alamat pemesan</label>
<label for="" id="Label7" style="position:absolute;left:16px;top:210px;width:115px;height:18px;line-height:18px;z-index:9;">No. Telp.</label>
<label for="" id="Label8" style="position:absolute;left:16px;top:100px;width:115px;height:18px;line-height:18px;z-index:10;">Jumlah pesanan</label>
<label for="" id="Label8" style="position:absolute;left:228px;top:100px;width:115px;height:18px;line-height:18px;z-index:10;">Total</label>
<label for="" id="Label8" class="total_harga" style="position:absolute;left:278px;top:100px;width:115px;height:18px;line-height:18px;z-index:10;">0.0</label>
<input type="number" id="Editbox1" style="position:absolute;left:128px;top:100px;width:85px;height:16px;z-index:11;" name="tjml" value="" spellcheck="false" onkeyup="hitung_jumlah()" onkeydown="hitung_jumlah()">
<input type="text" id="Editbox2" style="position:absolute;left:128px;top:140px;width:191px;height:16px;z-index:12;" name="tnapes" value="" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:128px;top:176px;width:191px;height:16px;z-index:13;" name="talpes" value="" spellcheck="false">
<input type="text" id="Editbox4" style="position:absolute;left:128px;top:210px;width:191px;height:16px;z-index:14;" name="tnotel" value="" spellcheck="false">
<input type="submit" id="Button1" onclick="window.location.href='index.php';return false;" name="" value="< - - - -" style="position:absolute;left:88px;top:281px;width:51px;height:59px;z-index:15;" title="Kembali">
<div id="wb_IconFont1" style="position:absolute;left:233px;top:94px;width:44px;height:39px;text-align:center;z-index:16;">
</form>
</div>