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
<script language="javascript">
  function validasikecamatan(){
  var kec=document.forms["form_kecamatan"]["kec"].value;
  var kat=(form_kecamatan.kec.value);
  if (kat=="0"){
  alert("Kecamatan belum dipilih!");
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
            <h2 class="entry-title"><a href="#">Pilih Jenis Fasilitas Umum Untuk Melihat Rekomendasi Di Peta</a></h2><hr />
            <div class="entry-content">
<div align="center">
		<table class="tabel">
        <thead>
        <th col="col">NO</th>
        <th col="col">JENIS FASILITAS UMUM</th>
        <th col="col">KATEGORI</th>
        <th col="col">LIHAT</th>
        </thead>
        <tbody>
		  <?php
		  	$link=koneksi_db();
			$sql="select j.*,k.* from jenis_fasum j, kategori_fasum k where j.id_kategori=k.id_kategori order by jenis_fasum"; 
			$res=mysql_query($sql,$link); 
			$i=0;
			$n=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
				$n++;
		  ?> 
		  	<tr>
		  	   <td><?php echo $n;?></td>
		  	   <td><?php echo $data['jenis_fasum'];?></td> 
		  	   <td><?php echo $data['nama_kategori'];?></td>
               <td align="center"><a href="rekomendasi2.php?id_jenis=<?php echo $data['id_jenis'];?>"><img src="../images/view.png" border="0"></a></td>
		  	</tr>
		  <?php
		  	} 
		  ?> 
        </tbody>
		</table>
        </div>   
            </div>
        </article>  
    </div> 
</div> 
    <footer id="footer">
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