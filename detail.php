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
$id_fasum=$_REQUEST['id_fasum'];
$link=koneksi_db();
$sql="select d.*,f.nama_fasum from detail_fasum d, fasum f where d.id_fasum='$id_fasum' and d.id_fasum=f.id_fasum order by id_detail";
$res1=mysql_query($sql,$link);            
$data1=mysql_fetch_array($res1)
?>
<h2 class="entry-title"><a href="#">Detail <?php echo $data1['nama_fasum'];?></a></h2><hr />
            <div class="entry-content">
                
<?php
$res=mysql_query($sql,$link); 
$banyakrecord=mysql_num_rows($res); 
if($banyakrecord>0){ 
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?> 
		  	<fieldset>
            <legend>ID Detail Fasilitas Umum: <?php echo $data['id_detail'];?></legend>
		  	   <table>
               <tr>
               <td><img id="img" src="images/<?php echo $data['gambar'];?>" width="150px" height="150px"></td></tr><tr>
               <td><p><?php echo $data['deskripsi'];?></p></td>
		  	   </tr>
               </table>
               </fieldset>
		  <?php
		  	} 
		  ?> 
        
	<?php
	}
	else{ 
	?> 
	<div class="error">Detail belum diisi.</div>
    
	<?php
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
    <footer id="footer" align="center">
		<?php footer();?>
    </footer> 
    <div class="clear"></div>
</div> 
</body>
</html>

