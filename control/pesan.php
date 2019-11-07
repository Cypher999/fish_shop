<?php
session_start();
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

$pesan=new Pesan();
$id_baru=array();
$isi=$pesan->search_data("*","selectAll");
if(mysqli_num_rows($isi)<=0){
	$id="PES-1";
}
else{
 	while($is_k=mysqli_fetch_assoc($isi)){
 		$id_lama=explode("PES-",$is_k["kd_pesan"]);
 		array_push($id_baru,$id_lama[1]);
 	}
 	sort($id_baru);
 	$id="PES-".($id_baru[count($id_baru)-1]+1);
}
$pesan->setVal($id."+#+".$_POST["kd_ikan"]."+#+".$_POST["tjml"]."+#+".$_POST["tnapes"]."+#+".$_POST["talpes"]."+#+".$_POST["tnotel"]."+#+".date('Y/m/d')."+#+".$_SESSION["id_user_ikan"]);
$pesan->save_new_data();
echo "<script>window.location.href='http://localhost/ikan/';</script>";
	

?>