<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Peta dengan Marker Default</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Leaflet CSS & JS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    body { margin: 0; padding: 0; }
    #map { height: 500px; width: 100%; }
  </style>
</head>
<body>
  <h2 style="text-align:center">Pemetaan Fasilitas Umum</h2>
  <div id="map"></div>

  <script>
    var map = L.map('map').setView([-6.832858, 107.953184], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
  </script>

  <?php
  // Koneksi database
  $link = mysqli_connect("localhost", "root", "", "sig");

  $res = mysqli_query($link, "SELECT * FROM fasum");
  echo "<script>\n";
  while($data = mysqli_fetch_array($res)) {
      $lat = $data['lat'];
      $lng = $data['lng'];
      $nama = addslashes($data['nama_fasum']);
      $alamat = addslashes($data['alamat']);

      echo "L.marker([$lat, $lng]).addTo(map).bindPopup('<b>$nama</b><br>$alamat');\n";
  }
  echo "</script>";
  ?>
</body>
</html>
