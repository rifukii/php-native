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
            <h2 class="entry-title"><a href="home.php">Beranda</a></h2> <hr />
            <div class="entry-content">
            	<p>Selamat datang </p>
                <img id="img" src="images/peta-beranda.jpg" alt="Post thumbnail" class="thumbnail alignleft" width="220px" height="200px" />
                
                <p>Pembangunan sistem informasi geografis pemetaan fasilitas umum ini bertujuan untuk membantu mempermudah pengelolaan data fasilitas umum dengan pengelolaan data berbasis database, mempermudah pemantauan keadaan fasilitas umum dan menampilkan status pembangunan fasilitas umum yang ada serta memberikan rekomendasi pembangunan yang tepat.
</p>
            </div>
        </article> 
    </div> 
    <aside id="sidebar" role="complementary">
    <aside class="widget">
            <?php kalender();?>
			<?php support();?>
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