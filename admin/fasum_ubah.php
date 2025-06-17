<?php 
	session_start();
	if(isset($_SESSION['sudahlogin']))
	{
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="../images/icon.ico">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function validasi(){
  var nama=document.forms["form_ubah_fasum"]["nama_fasum"].value;
  var jns=(form_ubah_fasum.id_jenis.value);
  var kec=(form_ubah_fasum.id_kecamatan.value);
  var ins=(form_ubah_fasum.id_instansi.value);
  if (nama==null || nama==""){
  alert("Nama fasum harus diisi!");
  return false;
  } else if (jns=="0") {
  alert("Jenis fasilitas umum belum dipilih!");
  return false;
  } else if (kec=="0") {
  alert("Kecamatan belum dipilih!");
  return false;
  } else if(ins=="0") {
  alert("Instansi belum dipilih!");
  return false;
  }
  return true;
}

</script>
</head>
<body onLoad="initialize()">
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
            <h2 class="entry-title"><a href="#">Pengubahan Data Fasilitas Umum</a></h2><hr />
            <div class="entry-content">
<?php 
$id_fasum=$_REQUEST['id_fasum'];
$link=koneksi_db();
$sql="select f.*,j.jenis_fasum,ke.nama_kecamatan,i.singkatan from fasum f,jenis_fasum j,kecamatan ke, instansi i where f.id_fasum='$id_fasum' and f.id_jenis=j.id_jenis and f.id_kecamatan=ke.id_kecamatan and f.id_instansi=i.id_instansi";
$res=mysql_query($sql);
if(mysql_num_rows($res)==1){
$data_fasum=mysql_fetch_array($res);
?>
<div align="center">
 <form method=post action="fasum_ubah2.php" name="form_ubah_fasum">
	<fieldset>
        <legend>Pengubahan Data Fasum</legend>
        <table align="center" bgcolor="white" border=0 cellspacing="10px">
		
<!--/NOMOR/------------------------------------>		
		<tr class="hide">
            <td>Nomor</td>
        	<td><input type=text name="id_fasum" value="<?php echo $data_fasum['id_fasum'];?>" readonly>
			</td>
            
        </tr>
<!--/NAMA/------------------------------------>
		<tr>

       		<td>Nama</td>
        	<td><input type="text" name="nama_fasum" value="<?php echo $data_fasum['nama_fasum'];?>"size=31 maxlength=30>
			</td>
            
       	</tr>
<!--/FASUM/------------------------------------>
		<tr>
        	<td>Jenis Fasum</td>
            <td><select name="id_jenis">
            	<option value="<?php echo $data_fasum['id_jenis']; ?>"><?php echo $data_fasum['jenis_fasum']; ?></option>
				<?php
				$sql="select * from jenis_fasum order by jenis_fasum";
				$result=mysql_query($sql);
				while($data_jenis=mysql_fetch_array($result)){
				if($data_fasum['id_jenis']<>$data_jenis['id_jenis']){
				?>
				<option value="<?php echo $data_jenis['id_jenis']; ?>"><?php echo $data_jenis['jenis_fasum']; ?></option>
				<?php	
				}
				}
				?>
                </select>
         	</td>
       	</tr>
<!--/KONDISI/------------------------------------>
		<tr>
        	<td>Kondisi</td>
            <td><select name="kondisi">
					<?php 
					echo "<option value=\"".$data_fasum['kondisi']."\">".$data_fasum['kondisi']."</option>";
					?>
             		<option value="Baik">Baik</option>
             		<option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
		 	 	</select></td>
        </tr>
<!--/ALAMAT/------------------------------------>
    	<tr>
        	<td>Alamat</td>
            <td><textarea name="alamat" cols="50" rows="5"><?php echo $data_fasum['alamat'];?></textarea>
            </td>
        </tr>
<!--/KECAMATAN/------------------------------------>
        <tr>
        	<td>Kecamatan</td>
            <td><select name="id_kecamatan">
            <option value="<?php echo $data_fasum['id_kecamatan']; ?>"><?php echo $data_fasum['nama_kecamatan']; ?></option>
		    <?php
				$sql="select * from kecamatan order by nama_kecamatan";
				$result=mysql_query($sql);
				while($data_kecamatan=mysql_fetch_array($result)){
				if($data_fasum['id_kecamatan']<>$data_kecamatan['id_kecamatan']){
				?>
				<option value="<?php echo $data_kecamatan['id_kecamatan']; ?>"><?php echo $data_kecamatan['nama_kecamatan']; ?></option>
				<?php	
				}
				}
				?>
			</select>
            </td>
      	</tr>
<!--/INSTANSI/------------------------------------>
        <tr>
        	<td>Instansi</td>
            <td><select name="id_instansi">
		    <option value="<?php echo $data_fasum['id_instansi']; ?>"><?php echo $data_fasum['singkatan']; ?></option>
		    <?php
				$sql="select * from instansi order by singkatan";
				$result=mysql_query($sql);
				while($data_instansi=mysql_fetch_array($result)){
				if($data_fasum['id_instansi']<>$data_instansi['id_instansi']){
				?>
				<option value="<?php echo $data_instansi['id_instansi']; ?>"><?php echo $data_instansi['singkatan']; ?></option>
				<?php	
				}
				}
				?>
			</select>
            </td>
      	</tr>
<!--/PENGINPUT/------------------------------------>
    	<tr class="hide">
        	<td>Penginput</td>
            <td><input type=text name="username" value="<?php echo $_SESSION['username'];?>" readonly></td>
        </tr>
<!--/TOMBOL/------------------------------------>
        <tr>
        	<td colspan="2"><div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasi()">
     <img src="../images/ya.png">Tentukan Koordinat</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td>
        </tr>
	</table></fieldset>
</form>   
    </div>
    <?php
}
else {
	?>
	<div class="error">Data tidak ditemukan!</div>
	<?php
}
?>

            </div>
        </article>  
    </div> 
    
</div> 
    <footer id="footer"a align="center">
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