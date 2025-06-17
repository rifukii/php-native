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
            <h2 class="entry-title"><a href="home.php">Beranda</a></h2> <hr />
            <div class="entry-content">
            	<table><tr>
                <td><img src="../images/admin.png"></td>
                <td valign="top"><h3>Selamat datang <?php echo $_SESSION['username'];?></h3>
                 Silahkan pilih menu yang diinginkan.
                 <ol>
                 <li>Menu Data Master untuk mengelola jenis fasilitas umum, kategori fasilitas umum, kecamatan, instansi, peraturan dan poligon.</li>
                 <li>Menu Data Fasilitas Umum untuk mengelola fasilitas umum beserta detailnya.</li>
                 <li>Menu Data Komentar untuk mengelola/menyetujui komentar.</li>
                 <li>Menu Lihat Peta untuk melihat pemetaan fasilitas umum.</li>
                 <li>Menu Status untuk melihat status pembangunan fasilitas kesehatan, transportasi dan perekonomian per kecamatan.</li>
                 <li>Menu Rekomendasi untuk melihat rekomendasi pembangunan.</li>
                 <li>Menu Laporan untuk membuat laporan.</li></td></tr>
                 </table>
                
                
            </div>
        </article> 
    </div> 

</div> 
    <footer id="footer"a align="center">
         <?php footer();?>
    </footer> 
</div> 
</body>
</html>
<?php
	}
	else
		header("Location: haruslogin.php");
?>