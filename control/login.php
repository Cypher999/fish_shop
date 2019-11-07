<?php
session_start();
class simple_db_framework{
	//parameter dibawah ini boleh dirubah sesuai kebutuhan,kosongkan nilai dari variabel yang tidak dibutuhkan
	//this parameters below is changable if needed, empty the variable that you feel is useless
	public $table="user";//nama dari tabel * table's name
	public $identifier='nm';//field untuk identifikasi lokasi record *field to identify the record's location
	public $field=array('nm','password');//field yang ada didalam tabel kecuali identifier * fields inside table excluding identifier
	
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
$login=new simple_db_framework();
$ada_nama=0;
$pass_cocok=0;
$login->setVal($_POST["tnm"]."+#+".$_POST["tps"]);
$sql=$login->search_data("*","notAll");
if(mysqli_num_rows($sql)<=0){
	echo "<script>alert('nama tidak ditemukan');</script>";
	echo "<script>window.location.href='http://localhost/ikan/'</script>";			
}
else{
	$isi_password=mysqli_fetch_assoc($sql);
	if($isi_password["password"]==$_POST["tps"]){
		$_SESSION["id_user_ikan"]=$isi_password["id_user"];
		if($_SESSION["id_user_ikan"]=="US-1"){
			echo "<script>window.location.href='http://localhost/ikan/'</script>";		
		}
		else{
			echo "<script>window.location.href='http://localhost/ikan/'</script>";			
		}
	}
	else{
		echo "<script>alert('password salah');</script>";
		echo "<script>window.location.href='http://localhost/ikan/'</script>";			
	}
}
?>