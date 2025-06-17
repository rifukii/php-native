<?php 
	session_start();
	if(isset($_SESSION['sudahlogin']))
	{
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<?php 
	include("lib_func.php");
	$id_jenis=$_REQUEST['id_jenis'];
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link rel="Icon" href="../images/icon.ico">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var map;
  function initialize() {
  
  var myLatlng = new google.maps.LatLng(-6.8275923840972075,107.95801391699172);

  var myOptions = {
     zoom: 10,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
<?php 
		
		$link=koneksi_db();

		$sql="select f.*,j.icon, j.jenis_fasum,a.id_aturan_jarak, a.id_jenis, a.id_jenis2, IFNULL(a.meter,0) AS meter from jenis_fasum j, fasum f LEFT OUTER JOIN aturan_jarak a ON (a.id_jenis2=f.id_jenis) WHERE f.id_jenis=j.id_jenis AND a.id_jenis='$id_jenis'"; 
		$res=mysql_query($sql,$link); 
		  	$i=0;
		  	while($data=mysql_fetch_array($res)){
		  		$i++; 
		  ?>
var radius = new google.maps.Circle({
	center : new google.maps.LatLng(<?php echo $data['lat'];?>,<?php echo $data['lng'];?>),
	radius : <?php echo $data['meter'];?>,
	fillColor: "#00a2ff",
	fillOpacity : 1.0,
	strokeColor : "#00a2ff",
	strokeOpacity : 1.0,
	map : map
});
google.maps.event.addListener(radius, 'click', function(event) {
alert("Melanggar aturan jarak!");
});
<?php } ?>


var kmlOptions = {preserveViewport:1, suppressInfoWindows: true};
<?php 
		$link=koneksi_db();
		$res3=mysql_query("SELECT * FROM poligon where id_poligon=36");
		while($kec=mysql_fetch_array($res3)){
 		?>
	layerkec = new google.maps.KmlLayer('<?php echo $kec['url'];?>', kmlOptions);
    layerkec.setMap(map,this);
	document.getElementById('lihatkec').checked = true; 
    
    <?php }?>	
var marker2;
function placeMarker(location) {  
if ( marker2 ) {
  marker2.setPosition(location);
  document.getElementById("latbox").value = location.lat();
  document.getElementById("lngbox").value = location.lng();
  } else {
    marker2 = new google.maps.Marker({
      position: location,
      map: map,
	  draggable: false
    }); 
  document.getElementById("latbox").value = location.lat();
  document.getElementById("lngbox").value = location.lng(); 
  }
}

google.maps.event.addListener(layerkec, 'click', function(event) {
placeMarker(event.latLng);
});
google.maps.event.addListener(map, 'click', function(event) {
alert("Koordinat harus di wilayah Kabupaten Sumedang!");
});
}

</script>
</head>
<body onLoad="initialize()">
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
            <h2 class="entry-title"><a href="#">Rekomendasi Pembangunan Fasilitas Umum Jenis:
            	<?php
			 	$res2=mysql_query("SELECT * FROM jenis_fasum WHERE id_jenis='$id_jenis'");
				while($data2=mysql_fetch_array($res2)){
					echo $data2['jenis_fasum'];
				}
			 ?>
            </a></h2><hr />
            <div class="entry-content">
            
                <div align="center">
    <form method=post action="fasum_proses_tambah.php" name="form_tambah_fasum">
    <fieldset>
    <legend>Rekomendasi Pembangunan</legend>
    <div id="map_canvas" style="border:1px solid #999"></div>
     <h3>Keterangan</h3>
     <table align="center" bgcolor="white" border="0" cellspacing="10px">
     <tr><td><img src="../images/ket2.jpg"></td><td>Area yang direkomendasikan</td></tr>
     <tr><td><img src="../images/ket1.jpg"></td><td>Area yang dilarang</td></tr>
     </table>
     <h3>Klik area di peta untuk mendapatkan koordinat</h3>
     <table align="center" bgcolor="white" border="0" cellspacing="10px">     
     <td>Latitude</td><td><input type="text" name="lat" size=17 maxlength=220 id="latbox" pattern="-?\d{1,2}\.\d+" title="Format: 00.0+"></td></tr>
     <tr><td>Longitude</td><td><input type="text" name="lng" size=17 maxlength=20 id="lngbox" pattern="-?\d{1,3}\.\d+" title="Format: 000.0+"></td></tr>
     <h3 class="hide">Poligon</h3>
<input class="hide" type="checkbox" id="lihatkec" onClick="fungsilihatkec();"><!--Poligon kecamatan-->
  </table> </fieldset>
</form></div>

            </div>
        </article>  
    </div> 
    
</div> 
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