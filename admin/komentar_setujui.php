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
            <h2 class="entry-title"><a href="#">Penyetujuan Komentar</a></h2>       <hr />
            <div class="entry-content">
                <?php
	$id_komentar=$_REQUEST['id_komentar'];
	$link=koneksi_db();
	$sql="select * from komentar where id_komentar='$id_komentar'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)==1){
		$data=mysql_fetch_array($res);
	?>
    <div align="center">
	<form method=post action="komentar_proses_setujui.php">
		<fieldset>
        <legend>Penyetujuan Komentar</legend>
        <table align="center" cellspacing="10px">
        <tr class="hide"><td>ID</td><td>
        <input class="hide" type=text name="id_komentar" value="<?php echo $data['id_komentar'];?>" readonly></td></tr>        
        <tr><td>Perihal</td><td>
        <input type=text name="perihal" value="<?php echo $data['perihal'];?>" size=51 maxlength=50 readonly></td></tr>
        <tr class="hide"><td>Waktu</td><td>
        <input class="hide" type=text name="waktu" value="<?php echo $data['waktu'];?>" size=51 maxlength=50 readonly></td></tr>
        <tr><td>Nama</td><td>
        <input type=text name="nama" value="<?php echo $data['nama'];?>" size=51 maxlength=50 readonly></td></tr>
        <tr><td>Komentar</td><td>
        <textarea name="komentar" cols="50" rows="5" readonly><?php echo $data['komentar'];?></textarea></td></tr>
        <tr><td>Email</td><td>
        <input type=text name="email" value="<?php echo $data['email'];?>" size=51 maxlength=50 readonly></td></tr>
        <tr><td>Tampil</td><td>
        <input type=radio name="tampil" value="T" <?php if($data['tampil']=="T") echo "checked";?>><font size="2">Tidak<br>
<input type=radio name="tampil" value="Y" <?php if($data['tampil']=="Y") echo "checked";?>>Ya</font></td></tr>
		<tr class="hide"><td>Pengelola</td><td>
        <input class="hide" type=text name="username" value="<?php echo $_SESSION['username'];?>" size=51 maxlength=50></td></tr>
        <tr><td colspan="2"><div class="buttons" align="center"><button type="submit" value="Simpan" class="positive">
     <img src="../images/ya.png">Setujui</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td></tr></table>
     </fieldset>
	</form>
    </div>
	<?php
	}
	else {
	?><div class="error">Data tidak ditemukan!</div>
	<a href="komentar_lihat.php"><center>Kembali ke pengolahan data.</center></a>
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