<?php 
	session_start();
	if(isset($_SESSION['sudahlogin']))
	{
?>
<!doctype html>
<html lang="id">
<head>
	<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pemetaan Fasilitas Umum Kabupaten Sumedang</title>
    <link href="style.css" rel="stylesheet" />  
    <link rel="Icon" href="../images/icon.ico">   
<script>
  function validasijumlah(){
  var jml=document.forms["form_ubah_jumlah"]["jml_minimal"].value;
  var jns=(form_ubah_jumlah.id_jenis.value);
  if (jns=="0"){
  alert("Jenis fasilitas umum belum dipilih!");
  return false;
  } else if (jml==null || jml=="") {
  alert("Jumlah harus diisi!");
  return false;
  } else if (jml<0) {
  alert("Jumlah tidak boleh kurang dari 0!");
  return false;
  }
  return true;
}
</script>
</head>
<body>
<div id="wrapper">
    <header id="header" class="clearfix" role="banner">
		<?php head();?>
    </header>
<div id="main" class="clearfix">
    <nav id="menu" class="clearfix" role="navigation">
		<?php navigation();?>
    </nav>    
    <div id="content" role="main">
        <article class="post">
            <h2 class="entry-title"><a href="#">Pengubahan Aturan Jumlah Fasilitas Umum</a></h2>       <hr />
            <div class="entry-content">
                <?php
	$id_aturan_jumlah=$_REQUEST['id_aturan_jumlah'];
	$link=koneksi_db();
	$sql="select * from aturan_jumlah a,jenis_fasum j where id_aturan_jumlah='$id_aturan_jumlah' and a.id_jenis=j.id_jenis";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method="post" action="aturanjml_proses_ubah.php" name="form_ubah_jumlah">
		<fieldset>
        <table cellspacing="10px"><legend>Pengubahan Aturan Jumlah Fasilitas Umum</legend>
        <tr><td class="hide">ID</td><td>
        <input type=text name="id_aturan_jumlah" value="<?php echo $data['id_aturan_jumlah'];?>" class="hide"></td></tr>
        <tr><td>Jenis Fasum</td><td>
        <select name="id_jenis">
        	<option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['jenis_fasum']; ?></option>
		<?php
		$sql="select * from jenis_fasum";
		$result=mysql_query($sql);
		while($data2=mysql_fetch_array($result)){
			if($data['id_jenis']<>$data2['id_jenis']){
			?>
				<option value="<?php echo $data2['id_jenis']; ?>"><?php echo $data2['jenis_fasum']; ?></option>
			<?php	
			}
		}
		?>
        </select>
        </td></tr>
        <tr><td>Jumlah Minimal Per Kecamatan</td><td>
        <input type=text name="jml_minimal" value="<?php echo $data['jml_minimal'];?>" size=51 maxlength=50></td></tr>
        <tr><td colspan="2">
        <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasijumlah()">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div>
</td></tr></table>
</fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="warning">Data tidak ditemukan!</div>
	<a href="aturanjml_lihat.php"><center>Kembali ke pengolahan data.</center></a>
	<?php
	}
	?>
            </div>
        </article> 
  
    </div> 
    
</div> 
    <footer id="footer" align="center">
		<?php footer();?>
    </footer> 
    <div class="clear"></div>
</div> 
</body>
</html>
<?php
	}
	else
		header("Location: haruslogin.php");
?>