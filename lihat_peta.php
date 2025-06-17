<!doctype html>
<html lang="id">
<head>
<?php 
	include("lib_func.php");
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pemetaan Fasilitas Umum Kabupaten Sumedang</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="images/icon.ico"> 
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAq2y0ikTDqvshaBDU7BHiQbeRPyL96Vbo&sensor=true">
    </script>
<script type="text/javascript">
  function initialize() {
  var mapOptions = { center: new google.maps.LatLng(-6.832858,107.953184), zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  scaleControl: true
	  };
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
   
<?php 
		$link=koneksi_db();
		$sql="select f.*,j.*,ka.*,ke.*,i.* from fasum f, jenis_fasum j, kategori_fasum ka, kecamatan ke, instansi i WHERE f.id_jenis=j.id_jenis AND j.id_kategori=ka.id_kategori AND f.id_instansi=i.id_instansi AND f.id_kecamatan=ke.id_kecamatan"; 
		$res=mysql_query($sql,$link); 
		
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?>
		 
var image = 'icon/<?php echo $data['icon'];?>';
var marker = new google.maps.Marker({
  position: new google.maps.LatLng(<?php echo $data['lat'];?>, <?php echo $data['lng'];?>),
  map: map,
  title: '<?php echo $data['nama_fasum'];?>',
  <?php 
  $id=$data['id_fasum'];
  $dfasum=mysql_query("SELECT * FROM detail_fasum where id_fasum='$id'");
  $banyakrecord=mysql_num_rows($dfasum); 
  if($banyakrecord>0){ ?>
  html: '<h5><?php echo $data['nama_fasum'];?>
</h5><?php echo $data['alamat']; echo ", "; echo $data['nama_kecamatan'];echo " ";?><br><?php ?>
<?php
$j=0;
while($jmldfasum=mysql_fetch_array($dfasum)){
$j++;?>
<br><b>Detail:</b><?php echo $j;?>
<br><img src="images/<?php echo $jmldfasum['gambar'];?>" width="140px" height="140px"><br><?php echo $jmldfasum['deskripsi'];?><br><?php ?>
<?php
}?>',<?php }
else {?>
	html: '<h5><?php echo $data['nama_fasum'];?>
</h5><?php echo $data['alamat']; echo ", "; echo $data['nama_kecamatan'];echo " ";?><br><?php ?><b>Detail:</b> Belum Diisi',
<?php } ?>
  icon: image
  });
var infowindow = new google.maps.InfoWindow({
content: "detail"
});

  // Creating an InfoWindow object
google.maps.event.addListener(marker, 'click', function() {
	

 infowindow.setContent(this.html);
  infowindow.open(map,this);
  
});

<?php }?>
var kmlOptions = {preserveViewport: 1};
<?php 
		$res2=mysql_query("SELECT * FROM poligon where id_poligon=2");
		while($poli=mysql_fetch_array($res2)){
 		?>
 
    
	layersemua = new google.maps.KmlLayer('<?php echo $poli['url'];?>', kmlOptions);
    layersemua.setMap(map,this);
	document.getElementById('lihatsemua').checked = true; 
    
    <?php }?>
	
	
}

  
		
function fungsilihatsemua() {
    if (!document.getElementById('lihatsemua').checked)
      layersemua.setMap(null);
	else
      layersemua.setMap(map);
	  }


    </script>    
</head>
<body onLoad="initialize()" onUnload="GUnload()">
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
            <h2 class="entry-title"><a href="lihat_peta.php">Lihat Peta</a></h2><hr>
            <div class="entry-content">
               <div class="post" id="map_canvas" style="border: 1px solid grey;"></div>
            <table border="0">
            <tr><td><h3 class="hide">Poligon</h3>
<input type="checkbox" id="lihatsemua" onClick="fungsilihatsemua();" class="hide"> <!--Layer kecamatan--></td><td><h3>Legenda</h3>
<ul style="list-style:none;"><?php $res3=mysql_query("SELECT * FROM jenis_fasum");
		while($legend=mysql_fetch_array($res3)){
			?>
            <li><img src="icon/<?php echo $legend['icon'];?>" width="20px" height="20px"> <?php echo " ";?> <?php echo $legend['jenis_fasum'];?></li>
<?php }?></ul></td>
</tr></table></div>
            
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
</div> 
</body>
</html>