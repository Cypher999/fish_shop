<?php
class Ikan{
	public $table="ikan";
	public $identifier='kd_ikan';
	public $field=array('nm_ikan','hrg');
	
	public $Host="localhost";
	public $User="root";
	public $Pass="";
	public $Database="dbikan";
	function setVal($val)
	{
		$this->Value=$val;
	}
	function __construct(){
		$this->conn=mysqli_connect($this->Host,$this->User,$this->Pass,$this->Database);
		$this->Value="";
	}
	function search_data($Value,$type){
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
class User{
	public $table="user";
	public $identifier='id_user';
	public $field=array('nm');
	
	public $Host="localhost";
	public $User="root";
	public $Pass="";
	public $Database="dbikan";
	function setVal($val)
	{
		$this->Value=$val;
	}
	function __construct(){
		$this->conn=mysqli_connect($this->Host,$this->User,$this->Pass,$this->Database);
		$this->Value="";
	}
	function search_data($Value,$type){
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
class Pesan{
	public $table="pesan";
	public $identifier='id_user';
	public $field=array('kd_ikan','jml','nm','alt','telp','tgl','id_user');
	
	public $Host="localhost";
	public $User="root";
	public $Pass="";
	public $Database="dbikan";
	function setVal($val)
	{
		$this->Value=$val;
	}
	function __construct(){
		$this->conn=mysqli_connect($this->Host,$this->User,$this->Pass,$this->Database);
		$this->Value="";
	}
	function search_data($Value,$type){
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

<table style="position:absolute;left:202px;top:186px;width:986px;height:191px;z-index:32;" id="tabel_pesan">
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Nama<br>Pemesan</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Nama bibit ikan / harga</span></td>
<td class="cell2"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">jumlah pesanan</span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Total <br>Bayar</span></td>
<td class="cell4"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Alamat pemesan</span></td>
<td class="cell5"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">No. Telp</span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Kontrol</span></td>
</tr>
<?php
$pesan=new Pesan;
$ikan=new Ikan;
$user=new User;
if($_SESSION["id_user_ikan"]=='US-1'){
	$sql_pesan=$pesan->search_data("*","selectAll");
}
else{
	$pesan->setVal($_SESSION["id_user_ikan"]);
	$sql_pesan=$pesan->search_data("*","notAll");	
}
while($isi_pesan=mysqli_fetch_assoc($sql_pesan)):
?>
<tr  class="isi_tabel" id="<?php echo $isi_pesan["nm"];?>">
<td class="cell7"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $isi_pesan["nm"];?></span></td>
<td class="cell8"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php
$ikan->setVal($isi_pesan["kd_ikan"]);
$sql_ikan=$ikan->search_data("nm_ikan,hrg","notAll");
$isi_ikan=mysqli_fetch_assoc($sql_ikan);
echo $isi_ikan["nm_ikan"]." / ".$isi_ikan["hrg"];
 ?></span></td>
<td class="cell9"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $isi_pesan["jml"];?></span></td>
<td class="cell10"><?php echo ($isi_pesan["jml"]*$isi_ikan["hrg"]);?> Rp</td>
<td class="cell11"><?php echo $isi_pesan["alt"];?></td>
<td class="cell12"><?php echo $isi_pesan["telp"];?></td>
<td class="cell13"><form action='control/hapus_pesan.php' method="post"><button id="hapus_ikan" name="kd_pesan" value="<?php echo $isi_pesan["kd_pesan"];?>" style="display:inline-block;width:51px;height:49px;z-index:2;" title="Hapus"></button></form>
<input type="button" id="Button1" onclick="load_preview('<?php echo $isi_pesan["kd_pesan"];?>');ShowObjectWithEffect('wb_Form2', 1, 'blindvertical', 500);Animate('tabel_pesan', '', '550', '', '', '', 500, '');ShowObjectWithEffect('wb_Form3', 0, 'blindhorizontal', 500);return false;" name="" value="" style="display:inline-block;width:51px;height:49px;z-index:3;" title="Preview">
</td>
</tr>
<?php endwhile;?>
</table>