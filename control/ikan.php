<?php
class simple_db_framework{
	//parameter dibawah ini boleh dirubah sesuai kebutuhan,kosongkan nilai dari variabel yang tidak dibutuhkan
	//this parameters below is changable if needed, empty the variable that you feel is useless
	public $table="ikan";//nama dari tabel * table's name
	public $identifier='kd_ikan';//field untuk identifikasi lokasi record *field to identify the record's location
	public $field=array('nm_ikan','hrg');//field yang ada didalam tabel kecuali identifier * fields inside table excluding identifier
	
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
	
	function save_new_data(){//gunakan property ini untuk menyimpan data baru *use this property to save new data
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
	function edit_data(){//gunakan property ini untuk mengedit data *use this property to edit data
		$value_e=explode("+#+",$this->Value);
		for($i=1;$i<count($value_e);$i++){
			mysqli_query($this->conn,"update ".$this->table." set ".$this->field[$i-1]."='".$value_e[$i]."' where ".$this->identifier."='".$value_e[0]."'");
		}	
	}
	function delete_data(){ //gunakan property ini untuk menghapus data *use this property to delete data
		$value=explode("+#+",$this->Value);
		mysqli_query($this->conn,"delete from ".$this->table." where ".$this->identifier."='".$value[0]."'");
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

//tulis kode anda disini *write your code here
$ikan=new simple_db_framework();
if(isset($_POST["simpan_ikan"])){
	$id_baru=array();
	$isi=$ikan->search_data("*","selectAll");
	$gbr=$_FILES["gbr_ikan"]["tmp_name"];
	if(mysqli_num_rows($isi)<=0){
		$id="IK-1";
	}
	else{
 		while($is_k=mysqli_fetch_assoc($isi)){
 			$id_lama=explode("IK-",$is_k["kd_ikan"]);
 			array_push($id_baru,$id_lama[1]);
 		}
 		sort($id_baru);
 		$id="IK-".($id_baru[count($id_baru)-1]+1);
	}
	$ikan->setVal($id."+#+".$_POST["tnm"]."+#+".$_POST["thrg"]);
	$ikan->save_new_data();
	move_uploaded_file($gbr,"file/".$id.".jpg");
	echo "<script>window.location.href='http://localhost/ikan/ikan.php';</script>";
	
}
else if(isset($_POST["edit_ikan"])){
	$ikan->setVal($_POST["kd_ikan"]."+#+".$_POST["tnm"]."+#+".$_POST["thrg"]);
	$gbr=$_FILES["gbr_ikan"]["tmp_name"];
	$ikan->edit_data();
	if($gbr!=''){
		if(file_exists("file/".$_POST["kd_ikan"].".jpg")){
			unlink("file/".$_POST["kd_ikan"].".jpg");
		}
		move_uploaded_file($gbr,"file/".$_POST["kd_ikan"].".jpg");
	}

	echo "<script>window.location.href='http://localhost/ikan/ikan.php';</script>";
}
else if(isset($_POST["hapus"])){
	$ikan->setVal($_POST["hapus"]);
	$ikan->delete_data();
	if(file_exists("file/".$_POST["hapus"].".jpg")){
		unlink("file/".$_POST["hapus"].".jpg");
	}
	echo "<script>window.location.href='http://localhost/ikan/ikan.php';</script>";
}
?>