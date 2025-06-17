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
	$link=koneksi_db();
	$id_fasum=$_POST['id_fasum'];
	$nama_fasum=$_POST['nama_fasum'];
	$id_jenis=$_POST['id_jenis'];
	$kondisi=$_POST['kondisi'];
	$alamat=$_POST['alamat'];
	$id_kecamatan=$_POST['id_kecamatan'];
	$id_instansi=$_POST['id_instansi'];
	$username=$_POST['username'];
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" rel="stylesheet" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
	
var map;
  function initialize() {
 var myOptions = {
     zoom: 10,
     center: new google.maps.LatLng(-6.832858,107.953184),
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
  <?php 
		$link=koneksi_db();
		$id_fasum=$_REQUEST['id_fasum'];
		$sql0="select f.*,j.icon from fasum f,jenis_fasum j where f.id_jenis=j.id_jenis and id_fasum='$id_fasum'"; 
		$res0=mysql_query($sql0,$link); 
		
	  ?>
	  <?php
		  	$i=0;
		  	while($data0=mysql_fetch_array($res0)){
		  		$i++; 
		  ?> 
		  var pos = new google.maps.LatLng(<?php echo $data0['lat'];?>, <?php echo $data0['lng'];?>);
		  var image = '../icon/<?php echo $data0  ['icon'];?>';
		  <?php
		  	$jns= $data0['id_jenis'];
			} 
		  ?>
  
   var marker = new google.maps.Marker({
  draggable: false,
  position: pos, 
  map: map,
  title: "Lokasi fasum",
  icon: image
  }); 
  infoWindow = new google.maps.InfoWindow();
    infoWindow.setOptions({
        content: "<div>Lokasi fasum<br>Klik area di peta jika ingin mengubah koordinat</div>",
        position: pos
    });

    infoWindow.open(map);
 
<?php

$sql="select f.*,j.icon, j.jenis_fasum,a.id_aturan_jarak, a.id_jenis, a.id_jenis2, IFNULL(a.meter,0) AS meter from jenis_fasum j, fasum f LEFT OUTER JOIN aturan_jarak a ON (a.id_jenis2=f.id_jenis) WHERE f.id_jenis=j.id_jenis AND a.id_jenis='$id_jenis'"; 
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
  html: '<h5><?php echo $data['nama_fasum'];?>',
  icon: image
});
var radius = new google.maps.Circle({
	center : new google.maps.LatLng(<?php echo $data['lat'];?>,<?php echo $data['lng'];?>),
	radius : <?php echo $data['meter'];?>,
	fillColor: "#00ff00",
	fillOpacity : .3,
	strokeOpacity : .4,
	map : map
});
google.maps.event.addListener(radius, 'click', function(event) {
alert("Melanggar aturan jarak!");
});
<?php } ?>

  var kmlOptions = {preserveViewport:1, suppressInfoWindows: true};
<?php 
		$link=koneksi_db();
		$res3=mysql_query("SELECT * FROM poligon where id_poligon=1");
		while($kec=mysql_fetch_array($res3)){
 		?>
	layerkec = new google.maps.KmlLayer('<?php echo $kec['url'];?>', kmlOptions);
    layerkec.setMap(map,this);
	document.getElementById('lihatkec').checked = true; 
    
    <?php }?>
<?php 
		$link=koneksi_db();
		$poliq=mysql_query("SELECT * FROM `poligon` p, kecamatan k WHERE p.nama_poligon=k.nama_kecamatan AND k.id_kecamatan='$id_kecamatan'");
		while($poli=mysql_fetch_array($poliq)){
 		?>	
	layerkeckec = new google.maps.KmlLayer('<?php echo $poli['url'];?>', kmlOptions);
    layerkeckec.setMap(map,this);
	document.getElementById('lihatkeckec').checked = true;
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
google.maps.event.addListener(layerkeckec, 'click', function(event) {
placeMarker(event.latLng);
});
google.maps.event.addListener(layerkec, 'click', function(event) {
alert("Koordinat harus di dalam kecamatan yang dimaksud!");
});
google.maps.event.addListener(map, 'click', function(event) {
alert("Koordinat harus di wilayah Kabupaten Sumedang!");
});
 
}
function validasi(){
  var nama=document.forms["form_ubah_fasum"]["nama_fasum"].value;
  var lat=document.forms["form_ubah_fasum"]["lat"].value;
  var lng=document.forms["form_ubah_fasum"]["lng"].value;
  if (nama==null || nama==""){
  alert("Nama fasum harus diisi!");
  return false;
  } else if (lat==null || lat==""){
  alert("Latitude harus diisi!");
  return false;
  } else if (lng==null || lng==""){
  alert("Longitude harus diisi!");
  return false;
  }
  return true;
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
            <h2 class="entry-title"><a href="#">Pengubahan Data Fasilitas Umum: <?php echo $nama_fasum;?></a></h2><hr />
            <div class="entry-content">
                <!--/KONEKSI/-->
<?php
$link=koneksi_db();
$sql="select f.*,j.jenis_fasum,ke.nama_kecamatan,i.singkatan from fasum f,jenis_fasum j,kecamatan ke, instansi i where f.id_fasum='$id_fasum' and f.id_jenis=j.id_jenis and f.id_kecamatan=ke.id_kecamatan and f.id_instansi=i.id_instansi";
$res=mysql_query($sql);
if(mysql_num_rows($res)==1){
$data_fasum=mysql_fetch_array($res);
?>
<div align="center">
<!--/FORM EDIT/-->
<form method=post action="fasum_proses_ubah.php" name="form_ubah_fasum">
	<fieldset>
        <legend>Penentuan koordinat fasilitas umum</legend>
        <div id="map_canvas" style="border:1px solid #999"></div>
        <table bgcolor="white" border=0 cellspacing="5px" align="center"><!--/NOMOR/------------------------------------>		
	 <tr class="hide">
     <td>Nomor</td><td>
     <input type=text name="id_fasum" value="<?php echo $id_fasum;?>">
	 </td></tr>
<!--/NAMA/------------------------------------>
	 <tr><td colspan="2"><b>Nama Fasilitas Umum: </b><?php echo $nama_fasum ?></td></tr><input class="hide" type="text" name="nama_fasum" value="<?php echo $nama_fasum;?>"size=31 maxlength=30>
<!--/FASUM/------------------------------------>
      <tr class="hide"><td>Jenis Fasum</td><td>
      <input type="text" name="id_jenis" value="<?php echo $id_jenis;?>"size=31 maxlength=30>
      </td>
      </tr>
<!--/KONDISI/------------------------------------>
	 <tr class="hide"><td>Kondisi</td><td>
     <input type="text" name="kondisi" value="<?php echo $kondisi;?>"size=31 maxlength=30></td>
     </tr>
<!--/ALAMAT/------------------------------------>
     <tr class="hide"><td>Alamat</td><td><textarea name="alamat" cols="50" rows="5"><?php echo $nama_fasum ?></textarea></td></tr>
<!--/KEC/------------------------------------> 
     <tr class="hide"><td>Kecamatan</td><td>
     <input type=text name="id_kecamatan" value="<?php echo $id_kecamatan ?>" readonly>
     </td></tr>
<!--/INS/------------------------------------>    
     <tr class="hide"><td>Instansi</td><td>
     <input type=text name="id_instansi" value="<?php echo $id_instansi ?>" readonly>
<!--/PENGINPUT/------------------------------------>     
     </td></tr>
     <tr class="hide"><td>Penginput</td><td><input type=text name="username" value="<?php echo $username ?>" readonly></td></tr>
<!--/LATITUDE/------------------------------------>
    	<h3>Klik area di peta untuk mendapatkan koordinat</h3><tr>
        	<td>Latitude:</td>
            <td><input type=text name="lat" value="<?php echo $data_fasum['lat'];?>"size=17 maxlength=20 id="latbox" pattern="-?\d{1,2}\.\d+" title="Format: 00.0+"></td>
        </tr>
<!--/LONGITUDE/------------------------------------>
    	<tr>
        	<td>Longitude:</td>
            <td><input type=text name="lng" value="<?php echo $data_fasum['lng'];?>"size=17 maxlength=20 id="lngbox" pattern="-?\d{1,3}\.\d+" title="Format: 000.0+"></td>
        </tr>
        <h3 class="hide">Poligon</h3>
<input class="hide" type="checkbox" id="lihatkec" onClick="fungsilihatkec();"><!--Poligon kecamatan-->
<input class="hide" type="checkbox" id="lihatkeckec" onClick="fungsilihatkeckec();"><!--Poligon kecamatan-->
        
<!--/TOMBOL/------------------------------------>
        <tr>
        	<td colspan="2"><div class="buttons" align="center"><button type="submit" value="Simpan" class="positive" onClick="return validasi()">
     <img src="../images/ya.png">Ubah</button><button type="reset" value="Batal" class="negative" onClick="javascript:history.back()">
     <img src="../images/tidak.png">Batal</button></div></td>
        </tr>
	</table></fieldset>
</form></div>
<?php
}
else {
	?>
	<div class="error">Data tidak ditemukan!</div>
	<?php
}
?>
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