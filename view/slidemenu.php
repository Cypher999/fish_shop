<?php
class simple_db_framework_2{
	public $table="user";
	public $identifier='id_user';
	public $field=array('nm','password');
	
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
$data_user=new simple_db_framework_2();
$data_user->setVal($_SESSION["id_user_ikan"]);
$isi_user=mysqli_fetch_assoc($data_user->search_data("nm","notAll"));

?>

<div id="SlideMenu1" style="position:absolute;left:7px;top:121px;width:169px;height:140px;z-index:20;">
<ul role="menu">
   <li class="SlideMenu1_Folder" aria-haspopup="true"><a><?php echo $isi_user["nm"];?></a>
      <ul role="menu" aria-expanded="true">
      	<?php if($_SESSION["id_user_ikan"]=="US-1"): ?>
         <li><a role="menuitem" href="ikan.php">Data Ikan</a></li>
         <li><a role="menuitem" href="data_user.php">Data User</a></li>
         <li><a role="menuitem" href="profil.php">Ganti password admin</a></li>
         <li><a role="menuitem" href="hasil_laporan.php">cetak laporan</a></li>
         <?php endif;?>
         <li><a role="menuitem" href="index.php">Menu awal</a></li>
         <li><a role="menuitem" href="daftar_pesanan.php">Data Pesanan</a></li>
         <li><a role="menuitem" href="profil.php">Profil</a></li>
         <li><a role="menuitem" href="logout.php">Logout</a></li>
      </ul>
   </li>
</ul>
</div>