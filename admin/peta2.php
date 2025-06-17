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
	$jns=$_POST['jns'];
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pemetaan Fasilitas Umum Kabupaten Sumedang</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="../images/icon.ico"> 
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
		if ($jns==0){
		$sql="select f.*,j.*,ka.*,ke.*,i.* from fasum f, jenis_fasum j, kategori_fasum ka, kecamatan ke, instansi i WHERE f.id_jenis=j.id_jenis AND j.id_kategori=ka.id_kategori AND f.id_instansi=i.id_instansi AND f.id_kecamatan=ke.id_kecamatan";
		}
		else
		{
		$sql="select f.*,j.*,ka.*,ke.*,i.* from fasum f, jenis_fasum j, kategori_fasum ka, kecamatan ke, instansi i WHERE f.id_jenis=j.id_jenis AND j.id_kategori=ka.id_kategori AND f.id_instansi=i.id_instansi AND f.id_kecamatan=ke.id_kecamatan AND f.id_jenis='$jns'";
		}
		$res=mysql_query($sql,$link); 
		
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?>
		 
var image = '../icon/<?php echo $data['icon'];?>';
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
</h5><?php echo $data['alamat']; echo ", "; echo $data['nama_kecamatan'];echo " ";?>
<a href="fasum_ubah.php?id_fasum=<?php echo $data['id_fasum'];?>"><img src="../images/edit.png" border="0"></a><?php ?>
<br><?php ?>
<?php
$j=0;
while($jmldfasum=mysql_fetch_array($dfasum)){
$j++;?>
<br><b>Detail:</b><?php echo $j;?>
<br><img src="../images/<?php echo $jmldfasum['gambar'];?>" width="140px" height="140px"><br><?php echo $jmldfasum['deskripsi'];?><br><?php ?>
<?php
}?>',<?php }
else {?>
	html: '<h5><?php echo $data['nama_fasum'];?>
</h5><?php echo $data['alamat']; echo ", "; echo $data['nama_kecamatan'];echo " ";?>
<a href="fasum_ubah.php?id_fasum=<?php echo $data['id_fasum'];?>"><img src="../images/edit.png" border="0"></a><?php ?>
<br><?php ?><b>Detail:</b> Belum Diisi',
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
		$link=koneksi_db();
		$res2=mysql_query("SELECT * FROM poligon where id_poligon=1");
		while($kab=mysql_fetch_array($res2)){
 		?>
	layerkab = new google.maps.KmlLayer('<?php echo $kab['url'];?>', kmlOptions);
    layerkab.setMap(map,this);
	document.getElementById('lihatkab').checked = true; 
    
    <?php }?>
<?php 
		$link=koneksi_db();
		$res3=mysql_query("SELECT * FROM poligon where id_poligon=2");
		while($kec=mysql_fetch_array($res3)){
 		?>
	layerkec = new google.maps.KmlLayer('<?php echo $kec['url'];?>', kmlOptions);
    layerkec.setMap(map,this);
	document.getElementById('lihatkec').checked = true; 
    
    <?php }?>
}

  
		
function fungsilihatkab() {
    if (!document.getElementById('lihatkab').checked)
      layerkab.setMap(null);
	else
      layerkab.setMap(map);
	  }
function fungsilihatkec() {
    if (!document.getElementById('lihatkec').checked)
      layerkec.setMap(null);
	else
      layerkec.setMap(map);
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
               <div class="post" id="map_canvas" style="border: 1px solid grey;">
            </div><h3>Poligon</h3>
<form method="post" action="peta2.php" name="form_jenis">
     <select name="jns">
			<option value="0">Tampil semua</option>
			<?php
			 	$link=koneksi_db();
				$res4=mysql_query("SELECT id_jenis,jenis_fasum FROM jenis_fasum where id_jenis='$jns' LIMIT 1");
				while($data4=mysql_fetch_array($res4)){
					echo "<option selected value=\"".$data4['id_jenis']."\">".$data4['jenis_fasum']."
					      </option>";
				}
				$res=mysql_query("SELECT * FROM jenis_fasum ORDER BY jenis_fasum");
				while($data=mysql_fetch_array($res)){
					echo "<option value=\"".$data['id_jenis']."\">".$data['jenis_fasum']."
					      </option>";
				}
			 ?>
			 </select>
             <button type="submit" value="Pilih" class="positive">
     <img src="../images/ya.png">Filter</button></form>
     <br>
<input type="checkbox" id="lihatkab" onClick="fungsilihatkab();">Poligon kabupaten<br>
<input type="checkbox" id="lihatkec" onClick="fungsilihatkec();">Poligon kecamatan<br><h3>Legenda</h3>
<ul style="list-style:none;"><?php $res3=mysql_query("SELECT * FROM jenis_fasum");
		while($legend=mysql_fetch_array($res3)){
			?>
            <li><img src="../icon/<?php echo $legend['icon'];?>" width="20px" height="20px"> <?php echo " ";?> <?php echo $legend['jenis_fasum'];?></li>
<?php }?></ul>
        </article> 
    </div>
        
   
</div> 
    <footer id="footer" align="center">
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