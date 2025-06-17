<!doctype html>
<html lang="id">
<head>
	<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="images/icon.ico">

<script language="javascript">
  function validasikomentar(){
  var hal=document.forms["form_komentar"]["perihal"].value;
  var nama=document.forms["form_komentar"]["nama"].value;
  var kmn=document.forms["form_komentar"]["komentar"].value;
  if (hal==null || hal=="") {
  alert("Perihal tidak boleh kosong!");
  return false;
  } else if (nama==null || nama=="") {
  alert("Nama tidak boleh kosong!");
  return false;
  } else if (kmn==null || kmn=="") {
  alert("Komentar tidak boleh kosong!");
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
            <h2 class="entry-title"><a href="#">Komentar</a></h2><hr />
            <div class="entry-content">
            <p>Halaman ini digunakan untuk memberikan masukan kepada Bappeda mengenai pembangunan fasilitas umum.</p>
			
<fieldset>
<legend>Kirim Komentar</legend>
<form method="post" action="komentar_proses_tambah.php" name="form_komentar">
  <label>Perihal*</label>
  <input type=text name="perihal" size=51 maxlength=50 class="wajib">
  <label>Nama*</label>
  <input type=text name="nama" size=51 maxlength=50 class="wajib">
  <label>Email</label>
  <input type=text name="email" size=51 maxlength=50>
  <label>Komentar*</label>
  <textarea name="komentar" cols="50" rows="5" class="wajib"></textarea>
  <label><img src="captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /></label>
  <label>Masukkan kode*:</label><input type="text" name="pin" />
  <label>* Wajib diisi</label><hr>
  <div class="buttons" align="center"><button type="submit" value="submit" name="submit" class="positive" onClick="return validasikomentar()">
     <img src="images/ya.png">Kirim</button><button type="reset" value="Batal" class="negative">
     <img src="images/tidak.png">Reset</button></div>
</form>
</fieldset>
				
				
		<table border=0 align="center" width="95%">
		  <tr class="judultable"><td align="center"><b>KOMENTAR</b></td></tr>
		  <?php
		    $link=koneksi_db();
		  	$i=0;
			$res=mysql_query("SELECT nama,perihal,komentar,DATE_FORMAT(waktu,'%d %b %Y, %T') w FROM komentar where tampil='Y' ORDER BY waktu DESC");
		  	while($data2=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  <tr>
          <td><fieldset class="komen">
		  <b><?php echo $data2['nama'];?></b>, pada: <?php echo $data2['w'];?><br>
          <b><?php echo $data2['perihal'];?></b><br>
          <?php echo $data2['komentar'];?></fieldset>
          </td></tr>
		  <?php
		  	} 
		  ?> 
		</table>

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
    <footer id="footer" align="center">
		<?php footer();?>
    </footer> 
    <div class="clear"></div>
</div> 
</body>
</html>

