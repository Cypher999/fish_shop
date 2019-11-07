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
?>
<table 
<?php if(isset($_SESSION["id_user_ikan"])):?>
style="position:absolute;left:199px;top:133px;width:611px;height:275px;z-index:40;"
<?php else:?>
style="position:absolute;left:499px;top:133px;width:611px;height:275px;z-index:40;"
<?php endif;?>
id="tabel_produk">
<tr>
<td colspan="4" class="cell0"><span style="color:#000000;font-family:arial;font-size:13px;line-height:32px;">&nbsp; </span><span style="color:#000000;font-family:arial;font-size:27px;line-height:32px;">DAFTAR PRODUK<br></span></td>
</tr>
<tr>
<?php
$baris=0;
$ikan=new simple_db_framework();
$isi_ikan=$ikan->search_data("*","selectAll");
while($isi=mysqli_fetch_assoc($isi_ikan)):
	$baris=$baris+1;
?>
<td class="cell1"><label for="" id="Label5" style="display:block;width:100%;z-index:8;"><?php echo $isi["nm_ikan"];?></label>
<div id="wb_Image1" style="display:inline-block;width:99px;height:99px;z-index:9;">
<img src="control/file/<?php echo $isi["kd_ikan"];?>.jpg" id="Image1" alt="Gambar produk">
</div>
<label for="" id="Label6" style="display:block;width:100%;z-index:10;"><?php echo $isi["hrg"];?> Rp</label>
<?php if(($_SESSION["id_user_ikan"]!="US-1")&&isset($_SESSION["id_user_ikan"])):?>
<form action="pesan.php" method="post">
<button id="Button2" name="pesan" value="<?php echo $isi["kd_ikan"];?>" style="display:inline-block;width:95px;height:32px;z-index:11;">pesan</button>
</form>
<?php endif;?>
</td>
<?php
if($baris==4||$baris==mysqli_num_rows($isi_ikan)):
?>
</tr>
<?php endif;endwhile;?>

</table>