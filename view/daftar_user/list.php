<?php
class User{
	public $table="user";
	public $identifier='is_user';
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

<table style="position:absolute;left:202px;top:186px;width:286px;height:191px;z-index:32;" id="tabel_pesan">
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Nama<br>User</span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Kontrol</span></td>
</tr>
<?php
$user=new User;
$sql_user=$user->search_data("*","selectAll");
while($isi_user=mysqli_fetch_assoc($sql_user)):
	if($isi_user["id_user"]!="US-1"):
?>
<tr  class="isi_tabel" id="<?php echo $isi_user["nm"];?>">
<td class="cell7"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $isi_user["nm"];?></span></td>
<td class="cell13"><form action='control/hapus_user.php' method='post'>
	<button id="hapus_ikan" name="id" value="<?php echo $isi_user["id_user"];?>" style="display:inline-block;width:51px;height:49px;z-index:2;" title="Hapus"></button></form>
</td>
</tr>
<?php endif;endwhile;?>
</table>