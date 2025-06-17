<!doctype html>
<html lang="id">
<head>
  <?php include("lib_func.php"); ?>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Pemetaan Fasilitas Umum Kabupaten Sumedang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="style.css" rel="stylesheet" />
  <link rel="icon" href="images/icon.ico">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    #map { height: 500px; width: 100%; border: 1px solid grey; }
  </style>
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
        <h2 class="entry-title"><a href="lihat_peta.php">Lihat Peta</a></h2><hr>
        <div class="entry-content">
          <div class="post" id="map"></div>
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

  
<script>
function initialize() {
  var map = L.map('map').setView([-6.832858, 107.953184], 10);

  // Tile dari OpenStreetMap
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);
<?php
  $link = koneksi_db();
  $res = mysqli_query($link, "SELECT * FROM fasum");
  while($data = mysqli_fetch_array($res)) {
    $lat = $data['lat'];
    $lng = $data['lng'];
    $nama = addslashes($data['nama_fasum']);
    $alamat = addslashes($data['alamat']);

    echo "
      var marker = L.marker([$lat, $lng]).addTo(map);
      marker.bindPopup('<b>$nama</b><br>$alamat');
    ";
  }
?>

  
}
</script>

    <footer id="footer"a align="center">
         <?php footer();?>
    </footer>
    <div class="clear"></div>
</div>
</body>
</html>
