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
            <h2 class="entry-title"><a href="home.php">Profil</a></h2> <hr />
            <div class="entry-content">
            <img id="img" src="images/bappeda.jpg" alt="Post thumbnail" class="thumbnail alignleft" width="220px" height="200px" />
<p>Badan Perencanaan Pembangunan Daerah (Bappeda) Kabupaten Sumedang dibentuk melalui Peraturan Daerah Nomor 18 Tahun 2009 tentang Pembentukan Organisasi Perangkat Daerah Kabupaten Sumedang. Bappeda adalah badan atau lembaga teknis di bawah bupati dan bertanggung jawab kepada bupati melalui Sekretaris Daerah. Badan ini mempunyai tugas pokok membantu bupati dalam penyelenggaraan pemerintahan daerah di bidang penelitian dan perencanaan pembangunan daerah.</p>
                <p> Bappeda terdiri dari beberapa bidang serta sub bidang di dalamnya. Salah satunya adalah Sub Bidang Tata Ruang dan Lingkungan Hidup yang berada di bawah Bidang Fisik. Sub bidang ini memiliki tugas untuk menggambarkan peta persebaran pembangunan daerah, termasuk di dalamnya pemetaan fasilitas umum. 
                </p>
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
</div> 
</body>
</html>