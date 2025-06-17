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
            <h2 class="entry-title"><a href="home.php">Hubungi Kami</a></h2> <hr />
            <div class="entry-content">
                <table>
                <tr><td><b>Nama Lembaga</b></td><td>: </td><td>Badan Perencanaan Pembangunan Daerah (Bappeda)</td></tr>
                <tr><td><b>Alamat</b></td><td>: </td><td>Jl. Empang No. 1 Sumedang</td></tr> 
                <tr><td><b>Kode Pos</b></td><td>: </td><td>45313</td></tr>
                <tr><td><b>Website</b></td><td>: </td><td>http://www.fasumsumedang.net</td></tr>
                <tr><td><b>Email</b></td><td>: </td><td>admin@fasumsumedang.net</td></tr> 
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
    <footer id="footer"a align="center">
         <?php footer();?>
    </footer> 
</div> 
</body>
</html>