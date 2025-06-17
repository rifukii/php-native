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
	$link=koneksi_db();
	$jns=$_REQUEST['id_jenis'];
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
            <?php 
			$jenis=mysql_query("select * from jenis_fasum where id_jenis=$jns");
			$data3=mysql_fetch_array($jenis)
			?>
            <h2 class="entry-title"><a href="#">Status Fasilitas Umum: <?php echo $data3['jenis_fasum'];?></a></h2><hr />
            <div class="entry-content">
            <div align="center">
        <table class="tabel">
		  <thead>
          <th col="col">NO</th>
          <th col="col">KECAMATAN</th>
          <th col="col">JUMLAH PER KECAMATAN</th>
          <th col="col">STATUS</th>
		  </thead>
          <tbody>
		  <?php

	$res=mysql_query("
SELECT k.nama_kecamatan, IFNULL( kes2.sub_jml, 0 ) AS jml_fasum_kesehatan
FROM kecamatan k
LEFT OUTER JOIN (
(
	SELECT nama_kecamatan, COUNT( * ) AS sub_jml
	FROM (
		SELECT f . * , k.nama_kecamatan
		FROM fasum f, kecamatan k
		WHERE f.id_kecamatan = k.id_kecamatan
	) AS kes
	WHERE id_jenis =$jns
	AND kondisi =  'Baik'
	GROUP BY id_kecamatan
) AS kes2
) ON ( k.nama_kecamatan = kes2.nama_kecamatan )
"); 
	$banyakrecord=mysql_num_rows($res);
	if($banyakrecord>0){ 
		  	$i=0;
			$n=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
				$n++; 
		  ?> 
		  	 <tr>
             <td><?php echo $n;?></td>
             <td><?php echo $data['nama_kecamatan'];?></td>
             <td align="center"><?php echo $data['jml_fasum_kesehatan'];?></td>
             <td><?php 
			 $aturan=mysql_query("select jml_minimal from (
			 select j.id_jenis, IFNULL(a.jml_minimal,0) as jml_minimal from jenis_fasum j LEFT OUTER JOIN aturan_jumlah a 
			 ON j.id_jenis=a.id_jenis) as q where id_jenis=$jns");
			 while($data2=mysql_fetch_array($aturan)){
			 if ($data['jml_fasum_kesehatan']>$data2['jml_minimal']){ 
			 echo "Bagus";
			 }else if ($data['jml_fasum_kesehatan']==$data2['jml_minimal']){
			 echo "Cukup";
			 }else
			 echo "Kurang";
			 }
			 ?></td>
             </tr>
             
		  <?php
		  	} 
		  ?>
          
	<?php
	}
	else{ 
	?> 
	<div>Data tidak ditemukan.</div>
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