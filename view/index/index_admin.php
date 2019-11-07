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
class Pesan{
	public $table="pesan";
	public $identifier='kd_ikan';
	public $field=array();
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
<table style="position:absolute;left:189px;top:190px;width:556px;height:134px;z-index:14;" id="Table1">
	<?php 
	$ikan=new Ikan();
	$jml_pesan=0;
	$sql_ikan=$ikan->search_data("*","selectAll");
	while ($isi_ikan=mysqli_fetch_assoc($sql_ikan)):
		$jml_pesan=0;
		$pesan=new Pesan();
		$pesan->setVal($isi_ikan["kd_ikan"]);
		$sql_pesan=$pesan->search_data("*","notAll");
		while($isi_pesan=mysqli_fetch_assoc($sql_pesan)):
			$jml_pesan=$jml_pesan+$isi_pesan["jml"];
		endwhile;
		?>
<tr>
<td class="cell0"><label for="" id="Label1" style="display:block;width:100%;z-index:2;"><?php echo $isi_ikan["nm_ikan"]?></label>
<div id="wb_Image1" style="display:inline-block;width:85px;height:85px;z-index:3;">
<img src="control/file/<?php echo $isi_ikan["kd_ikan"]?>.jpg" id="Image1" alt="">
</div>
</td>
<td class="cell1">
<br>
  <div style="background-color:black;width:<?php echo $jml_pesan;?>px;height:25px" title="<?php echo $jml_pesan;?>"></div>
<br>
  <div style="background-color:green;width:<?php echo ($isi_ikan["hrg"]/100);?>px;height:25px" title="<?php echo ($isi_ikan["hrg"]);?> Rp"></div>
<br>
  <div style="background-color:orange;width:<?php echo (($isi_ikan["hrg"]*$jml_pesan)/1000);?>px;height:25px" title="<?php echo $isi_ikan["hrg"]*$jml_pesan;?>"></div></td>
</tr>
<?php endwhile;?>
</table>
<label for="" id="Label2" style="position:absolute;left:772px;top:194px;width:164px;height:16px;line-height:16px;z-index:15;">Ket:</label>
<table style="position:absolute;left:765px;top:218px;width:225px;height:87px;z-index:16;" id="Table2">
<tr>
<td class="cell0" style="background-color:black"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><div style="color:black"></div></span></td>
<td class="cell1"><label for="" id="Label3" style="display:block;width:100%;z-index:7;">Jumlah pesanan</label>
</td>
</tr>
<tr>
<td class="cell2" style="background-color:green"></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Harga (1:100)</span></td>
</tr>
<tr>
<td class="cell2" style="background-color:orange"></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Pendapatan (1:1000)</span></td>
</tr>
</table>