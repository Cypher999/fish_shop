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
	public $identifier='kd_pesan';
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
$pesan=new Pesan();
$ikan=new Ikan();
$user=new User();
$pesan->setVal($_POST["kd_pesan"]);
$sql_pesan=$pesan->search_data("*","notAll");
$isi_pesan=mysqli_fetch_assoc($sql_pesan);
$user->setVal($isi_pesan["id_user"]);
$sql_user=$user->search_data("*","notAll");
$isi_user=mysqli_fetch_assoc($sql_user);
$ikan->setVal($isi_pesan["kd_ikan"]);
$sql_ikan=$ikan->search_data("*","notAll");
$isi_ikan=mysqli_fetch_assoc($sql_ikan);
?>
<form name="review" method="post" action="" enctype="multipart/form-data" id="Form2">
<div id="wb_luser" style="position:absolute;left:18px;top:30px;width:118px;height:16px;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;">User Pemesan </span></div>
<div id="wb_lnama" style="position:absolute;left:18px;top:73px;width:118px;height:16px;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Nama Pemesan</span></div>
<div id="wb_lalt" style="position:absolute;left:18px;top:112px;width:118px;height:16px;z-index:8;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Alamat Pemesan</span></div>
<div id="wb_lnotel" style="position:absolute;left:18px;top:153px;width:118px;height:16px;z-index:9;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No. telp pemesan</span></div>
<div id="wb_likan" style="position:absolute;left:18px;top:222px;width:118px;height:32px;z-index:10;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Nama ikan<br></span></div>
<div id="wb_lhrg" style="position:absolute;left:18px;top:254px;width:118px;height:32px;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Harga<br></span></div>
<div id="wb_tuser" style="position:absolute;left:136px;top:30px;width:149px;height:16px;z-index:12;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_user["nm"];?> </span></div>
<div id="wb_tnama" style="position:absolute;left:136px;top:72px;width:149px;height:16px;z-index:13;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_pesan["nm"];?></span></div>
<div id="wb_talt" style="position:absolute;left:136px;top:111px;width:149px;height:16px;z-index:14;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_pesan["alt"];?></span></div>
<div id="wb_tnotel" style="position:absolute;left:136px;top:152px;width:149px;height:16px;z-index:15;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_pesan["telp"];?></span></div>
<div id="wb_tikan" style="position:absolute;left:136px;top:222px;width:149px;height:16px;z-index:16;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_ikan["nm_ikan"];?></span></div>
<div id="wb_thrg" style="position:absolute;left:136px;top:254px;width:149px;height:16px;z-index:17;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_ikan["hrg"];?></span></div>
<div id="wb_ljml" style="position:absolute;left:350px;top:30px;width:118px;height:32px;z-index:18;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Jumlah Pesanan<br></span></div>
<div id="wb_ltotal" style="position:absolute;left:350px;top:65px;width:118px;height:32px;z-index:19;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Total Biaya<br></span></div>
<div id="wb_ltgl" style="position:absolute;left:18px;top:187px;width:118px;height:32px;z-index:20;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Tanggal pemesanan</span></div>
<div id="wb_ttgl" style="position:absolute;left:136px;top:187px;width:149px;height:16px;z-index:21;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php 
$tgl=date_create($isi_pesan["tgl"]);
echo date_format($tgl,"d")." ".bulan(date_format($tgl,"m"))." ".date_format($tgl,"Y");
?></span></div>
<div id="wb_tjml" style="position:absolute;left:468px;top:30px;width:149px;height:16px;z-index:22;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $isi_pesan["jml"];?></span></div>
<div id="wb_ttotal" style="position:absolute;left:468px;top:62px;width:149px;height:16px;z-index:23;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo ($isi_pesan["jml"]*$isi_ikan["hrg"]);?></span></div>
<input type="button" id="btn_close_rev" onclick="ShowObjectWithEffect('wb_Form2', 0, 'blindvertical', 500);Animate('tabel_pesan', '', '185', '', '', '', 500, '');return false;" name="" value="[ X ]" style="position:absolute;left:621px;top:3px;width:40px;height:25px;z-index:24;">
</form>