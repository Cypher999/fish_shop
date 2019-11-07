<?php
session_start();
class Hapus_user{
	public $table="user";
	public $identifier='id_user';
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
	
	function delete_data(){ 
		$value=explode("+#+",$this->Value);
		mysqli_query($this->conn,"delete from ".$this->table." where ".$this->identifier."='".$value[0]."'");
	}
	function __destruct(){
		mysqli_close($this->conn);
	}
}
class Hapus_pesan{
	public $table="pesan";
	public $identifier='id_user';
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
	
	function delete_data(){ 
		$value=explode("+#+",$this->Value);
		mysqli_query($this->conn,"delete from ".$this->table." where ".$this->identifier."='".$value[0]."'");
	}
	function __destruct(){
		mysqli_close($this->conn);
	}
}
$hapus_user=new Hapus_user();
$hapus_pesan=new Hapus_pesan();
if($_SESSION["id_user_ikan"]!="US-1"){
	$hapus_user->setVal($_SESSION["id_user_ikan"]);
	$hapus_pesan->setVal($_SESSION["id_user_ikan"]);
}
else{
	$hapus_user->setVal($_POST["id"]);
	$hapus_pesan->setVal($_POST["id"]);	
}
$hapus_user->delete_data();
$hapus_pesan->delete_data();
if($_SESSION["id_user_ikan"]=="US-1"){
	echo "<script>window.location.href='http://localhost/ikan/data_user.php'</script>";
}
else{
	session_unset();
	session_destroy();
	echo "<script>window.location.href='http://localhost/ikan/'</script>";
}

?>