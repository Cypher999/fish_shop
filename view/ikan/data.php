
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Nama<br>Ikan</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Harga<br>Ikan</span></td>
<td class="cell2"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Gambar</span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Kontrol</span></td>
</tr>
<?php
$db=mysqli_connect("localhost","root","","dbikan");
$sql=mysqli_query($db,"select * from ikan");
if(mysqli_num_rows($sql)<=0):
?>
<tr>
<td class="cell4" colspan=4><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">data kosong</span></td>
</tr>
<?php
else:?>
<?php
while($isi=mysqli_fetch_assoc($sql)):?>
<tr class="isi_tabel" id="<?php echo $isi["nm_ikan"];?>">
<td class="cell4"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $isi["nm_ikan"];?></span></td>
<td class="cell5"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><?php echo $isi["hrg"];?></span></td>
<td class="cell6"><picture id="wb_Picture1" style="display:block;width: 100%;height:148px;z-index:2">
<img src="control/file/<?php echo $isi["kd_ikan"]?>.jpg" id="Picture1" alt="gambar_ikan" srcset="">
</picture>
</td>

<td class="cell7"><input type="button" id="edit_ikan" onclick="edit('<?php echo $isi["kd_ikan"];?>');ShowObjectWithEffect('wb_edit_ikan', 1, 'blindvertical', 500);ShowObjectWithEffect('wb_cari_ikan', 0, 'blindvertical', 500);
ShowObjectWithEffect('wb_form_ikan', 0, 'blindvertical', 500);Animate('tabel_ikan', '', '510', '', '', '', 500, '');return false;" name="" value="" style="display:inline-block;width:51px;height:49px;z-index:3;" title="Edit">
<form action='control/ikan.php' method=post>
<button type="submit" id="hapus_ikan" name="hapus" value="<?php echo $isi["kd_ikan"];?>" style="display:inline-block;width:51px;height:49px;z-index:4;" title="Hapus"></button>
</form>
</td>
</tr>
<?php
endwhile;endif;?>
