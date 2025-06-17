<?php

	function head(){
	?>
		
<hgroup>
            <h1 id="site-title"><a href="home.php"><img src="../images/bappeda.png" width="400px" height="120px"></a></h1><br>
            <h2 id="site-description"><strong>HALAMAN ADMIN</strong></h2>
        </hgroup>
        
	<?php
	}
	function link_terkait(){
	?>
		<h3>Link Terkait</h3>
            <ul>
                <li><a href="http://bappeda.sumedangkab.go.id" target="_blank">Bappeda</a></li>
                <li><a href="http://www.sumedangkab.go.id" target="_blank">Sumedang</a></li>
                <li><a href="http://www.jabarprov.go.id" target="_blank">Jawa Barat</a></li>
           </ul>
           <h3>Support</h3>
            <a href="ymsgr:sendIM?black_spidey43"><img border=0 src="http://opi.yahoo.com/online?u=black_spidey43&m=g&t=2" /> </a><br /><br />

        
	<?php
	}
	
	function navigation(){
	?>
		<ul> 
            <li><a href="home.php">Beranda</a></li>
            <li>
                <a href="#">Data Master</a>
                <ul>
                    <li><a href="jenis_lihat.php">Jenis Fasilitas Umum</a></li>
                    <li><a href="kategori_lihat.php">Kategori</a></li>
                    <li><a href="kecamatan_lihat.php">Kecamatan</a></li>
                    <li><a href="instansi_lihat.php">Instansi</a></li>
                    <li><a href="aturanjml_lihat.php">Aturan Jumlah Fasum</a></li>
                    <li><a href="aturanjrk_lihat.php">Aturan Jarak Fasum</a></li>
                    <li><a href="poligon_lihat.php">Poligon</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Data Fasilitas Umum</a>
                <ul>
                    <li><a href="fasum_lihat.php">Fasilitas Umum</a></li>
                    <li><a href="detail_lihat.php">Detail Fasilitas Umum</a></li>
                </ul>
            </li>
            <li><a href="komentar_lihat.php">Data Komentar</a></li>
            <li><a href="peta.php">Peta</a></li>
            <li><a href="status.php">Status</a> </li>
            <li><a href="rekomendasi.php">Rekomendasi</a></li>
            <li><a href="laporan.php">Laporan</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
	<?php
	}
	function footer(){
	?>
	<p>Copyright &copy; 2012 <a href="http://bappeda.sumedangkab.go.id">Bappeda Sumedang</a>      
    <span class="sep">|</span>Design by Rifky
    </p>
	<?php
	}
	function tanggal(){
	?>
	<?php
	echo date("D, j-m-Y");
	?>
	<?php
	}
function koneksi_db(){
$host = "localhost";
$database = "fasumsum_sig";
$user = "fasumsum_rifky";
$password = "0804031991";
$link=mysql_connect($host,$user,$password);
mysql_select_db($database,$link);
if(!$link)
echo "Error : ".mysql_error();
return $link;
}
?>
