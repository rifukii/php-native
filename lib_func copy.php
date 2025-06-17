<?php

	function head(){
?>
  <hgroup>
    <img id="header-image" src="images/header.jpg" width="100%" height="120px">
  </hgroup>
<?php
}
	function link_terkait(){
	?>
		<fieldset>
        <legend>Link terkait</legend>
        
            <ul>
                <li><a href="http://bappeda.sumedangkab.go.id" target="_blank">Bappeda</a></li>
                <li><a href="http://www.sumedangkab.go.id" target="_blank">Sumedang</a></li>
                <li><a href="http://www.jabarprov.go.id" target="_blank">Jawa Barat</a></li>
           </ul>
         </fieldset>

        
	<?php
	}
	function support(){
	?>
		<fieldset>
        <legend>Support</legend>
            <a href="ymsgr:sendIM?black_spidey43"><img border=0 src="http://opi.yahoo.com/online?u=black_spidey43&m=g&t=11" /> </a><br />
</fieldset>
        
	<?php
	}
	function komen(){
	?>
		<!-- <fieldset>
        <legend>Komentar Baru</legend>
            <?php 
			$link=koneksi_db();
			$res=mysql_query("SELECT k.*, tbl1.* FROM (SELECT id_komentar, MID(komentar,1,25) AS komentar2 FROM komentar WHERE tampil='Y' ORDER BY waktu DESC LIMIT 3) tbl1, komentar k WHERE tampil='Y' AND tbl1.id_komentar=k.id_komentar ORDER BY waktu DESC LIMIT 3");
			while($komen=mysql_fetch_array($res)){
			echo "<strong>".$komen['nama']."</strong>";
			echo " mengatakan:<br> ";
			echo $komen['komentar2']."<br>";
			 
            
            }
			?>
</fieldset> -->
        
	<?php
	}
	function navigation(){
	?>
		<ul> 
            <li><a href="index.php">Beranda</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="lihat_peta.php">Peta</a></li>
            <li><a href="fasum_lihat.php">Fasilitas Umum</a></li>
            <!-- <li><a href="komentar.php">Komentar</a></li> -->
            <li><a href="kontak.php">Hubungi Kami</a></li>
            <!-- <li><a href="admin/index.php">Login</a></li> -->
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
		function koneksi_db() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "sig";

    $link = mysqli_connect($host, $user, $password, $database);
    if (!$link) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $link;
}

	function kalender(){
	?>

<div align="center"><iframe align="center" src="http://www.calendarlabs.com/calendars/web-content/calendar.php?cid=1001&uid=1110063759&c=22&l=en&cbg=dff8cd&cfg=000000&hfg=000000&hfg1=000000&ct=30&cb=1&cbc=92DB6F&cf=verdana&cp=bottom&sw=1&hp=t&ib=0&ibc=&i=images/" width="170" height="155" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency='true'>Loading...</iframe></div>

	<?php
	}
?>
 