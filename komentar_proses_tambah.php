<?php 
	session_start();
	include("lib_func.php");
	?>
<!doctype html>
<html lang="en">
<head>
	
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="images/icon.ico">
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
            <h2 class="entry-title"><a href="#">Penambahan Komentar Baru</a></h2><hr />
            <div class="entry-content">
<?php
if($_POST['submit']){
 if(md5($_POST['pin']) == $_SESSION['image_random_value']){
    $perihal=$_POST['perihal'];
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$komentar=$_POST['komentar'];
	$link=koneksi_db();
	$sql="insert into komentar values(null, trim('$perihal'),NOW(),trim('$nama'),trim('$komentar'),trim('$email'),'T',null)";
	$res=mysql_query($sql,$link); 
	if($res){
	?> 
		<div class="info">Komentar telah dikirim. Tunggu hingga admin/staf menyetujui komentar anda.</b></div>
<a href="komentar.php"><center>Kembali</center></a> 
	<?php
	} 
	else{
	?> 
		<div class="error">Terjadi kesalahan dalam pengiriman komentar dengan kesalahan <?php echo mysql_error();?>. Silahkan diulang lagi.<br></div>
<a href="javascript:history.back()"><center>Kembali</center></a>
	<?php
	} 
 
 }else{
 ?>
 <div class="error">Kode salah, silahkan ulangi!</div>
 <a href="javascript:history.back()"><center>Kembali</center></a>
 <?php
 }
}
?>
            

   
	
</div>
        </article> 
         
    </div> 
    <aside id="sidebar" role="complementary">
    <aside class="widget">
            <?php kalender();?>
			<?php support();?>
			<?php komen();?>
            <?php link_terkait();?>
      </aside>
    </aside>
</div> 
    <footer id="footer"a align="center">
         <?php footer();?>
    </footer>
    <div class="clear"></div>
</div> 
</body>
</html>
