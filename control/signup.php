<?php
session_start();
class simple_db_framework{
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
$signup=new simple_db_framework();
$id_baru=array();
$ada_nama=0;
$isi=$signup->search_data("*","selectAll");
if(mysqli_num_rows($isi)<=0){
	$id="US-2";
}
else{
 	while($is_k=mysqli_fetch_assoc($isi)){
 		$id_lama=explode("US-",$is_k["id_user"]);
 		array_push($id_baru,$id_lama[1]);
 	}
 	sort($id_baru);
 	$id="US-".($id_baru[count($id_baru)-1]+1);
}
if($_POST["tps"]!=$_POST["tkf"]){
	echo "<script>alert('Password tidak sama')</script>";
	echo "<script>window.location.href='http://localhost/ikan/'</script>";
}
else{
	$nama=$signup->search_data("nm","selectAll");
	while($isi_nama=mysqli_fetch_assoc($nama)){
		if($isi_nama["nm"]==$_POST["tnm"]){
			$ada_nama=1;
		}
	}
	if($ada_nama==1){
		echo "<script>alert('Nama sudah ada')</script>";
		echo "<script>window.location.href='http://localhost/ikan/'</script>";		
	}
	else{
		$signup->setVal($id."+#+".$_POST["tnm"]."+#+".$_POST["tps"]);		
		$signup->save_new_data();
		$_SESSION["id_user_ikan"]=$id;
		echo "<script>window.location.href='http://localhost/ikan/'</script>";		
	}
}
echo mysqli_error($signup->conn);
?>