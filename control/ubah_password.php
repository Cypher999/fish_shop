<?php
session_start();
class Password{
	public $table="user";
	public $identifier='id_user';
	public $field=array('password');
	
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
	
	function save_new_data(){
		$value_e=explode("+#+",$this->Value);
		for($i=0;$i<count($value_e);$i++){
			if($i==0){
				mysqli_query($this->conn,"insert into ".$this->table."(".$this->identifier.") value('".$value_e[0]."')");
			}
			else{
				mysqli_query($this->conn,"update ".$this->table." set ".$this->field[$i-1]."='".$value_e[$i]."' where ".$this->identifier."='".$value_e[0]."'");
			}
		}
		
	}
	function edit_data(){
		$value_e=explode("+#+",$this->Value);
		for($i=1;$i<count($value_e);$i++){
			mysqli_query($this->conn,"update ".$this->table." set ".$this->field[$i-1]."='".$value_e[$i]."' where ".$this->identifier."='".$value_e[0]."'");
		}	
	}
	function delete_data(){ 
		$value=explode("+#+",$this->Value);
		mysqli_query($this->conn,"delete from ".$this->table." where ".$this->identifier."='".$value[0]."'");
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
$password=new Password();
$password->setVal($_SESSION["id_user_ikan"]);
$cek_password=$password->search_data("password","notAll");
$isi_password=mysqli_fetch_assoc($cek_password);
if($isi_password["password"]==$_POST["tpass_lama"]){
	if($_POST["tpass_baru"]==$_POST["tkonfirm"]){
		$password_ganti=new Password();
		$password_ganti->setVal($_SESSION["id_user_ikan"]."+#+".$_POST["tpass_baru"]);
		$password_ganti->edit_data();
	}
	else{
		echo "<script>alert('Password konfirmasi tidak sama');</script>";
	}
}
else{
	echo "<script>alert('Password lama tidak sama');</script>";
}
echo "<script>window.location.href='http://localhost/ikan/profil.php'</script>";
?>