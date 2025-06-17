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
  function validasijarak(){
  var jrk=document.forms["form_ubah_jarak"]["meter"].value;
  var jns=(form_ubah_jarak.id_jenis.value);
  var jns2=(form_ubah_jarak.id_jenis2.value);
  if (jns=="0" || jns2=="0"){
  alert("Jenis fasilitas umum belum dipilih!");
  return false;
  } else if (jrk==null || jrk=="") {
  alert("Jarak harus diisi!");
  return false;
  } else if (jrk<0) {
  alert("Jarak tidak boleh kurang dari 0!");
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
            <h2 class="entry-title"><a href="#">Pengubahan Aturan Jarak Fasilitas Umum</a></h2>       <hr />
            <div class="entry-content">
                <?php
	$id_aturan_jarak=$_REQUEST['id_aturan_jarak'];
	$link=koneksi_db();
	$sql="select x.id_aturan_jarak, x.id_jenis, x.jenis_fasum, y.id_jenis2, y.jenis_fasum2, x.meter from (select a.id_aturan_jarak, a.id_jenis, j.jenis_fasum, a.meter from aturan_jarak a, jenis_fasum j where j.id_jenis=a.id_jenis) x, (select a.id_aturan_jarak, a.id_jenis2, j.jenis_fasum jenis_fasum2, a.meter from aturan_jarak a, jenis_fasum j where j.id_jenis=a.id_jenis2) y where x.id_aturan_jarak=y.id_aturan_jarak and x.id_aturan_jarak='$id_aturan_jarak'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method="post" action="aturanjrk_proses_ubah.php" name="form_ubah_jarak">
		<fieldset>
        <table cellspacing="10px"><legend>Pengubahan Aturan Jarak Fasilitas Umum</legend>
        <tr><td class="hide">ID</td><td>
        <input type=text name="id_aturan_jarak" value="<?php echo $data['id_aturan_jarak'];?>" class="hide"></td></tr>
        <tr><td>Jenis Fasum Yang Diatur</td><td>
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
        <tr><td>Jenis Fasum Pembanding</td><td>
        <select name="id_jenis2">
        	<option value="<?php echo $data['id_jenis2']; ?>"><?php echo $data['jenis_fasum2']; ?></option>
		<?php
		$sql="select * from jenis_fasum";
		$result=mysql_query($sql);
		while($data2=mysql_fetch_array($result)){
			if($data['id_jenis2']<>$data2['id_jenis']){
			?>
				<option value="<?php echo $data2['id_jenis']; ?>"><?php echo $data2['jenis_fasum']; ?></option>
			<?php	
			}
		}
		?>
        </select>
        </td></tr>
        <tr><td>Jarak Minimal (meter)</td><td>
        <input type=text name="meter" value="<?php echo $data['meter'];?>" size=51 maxlength=50></td></tr>
        <tr class="hide"><td>Penginput</td><td>
        <input class="hide" type=text name="username" value="<?php echo $_SESSION['username'];?>" readonly>
        </td></tr>
        <tr><td colspan="2">
        <div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasijarak()">
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
	<a href="aturanjrk_lihat.php"><center>Kembali ke pengolahan data.</center></a>
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