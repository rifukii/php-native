<?php 
$jns=$_REQUEST['id_jenis'];
include("lib_func.php");
$link=koneksi_db();
$sql1=mysql_query("select * from jenis_fasum where id_jenis='$jns'");
$data1=mysql_fetch_array($sql1);
$query = "select f.nama_fasum, f.alamat, ke.nama_kecamatan, j.jenis_fasum from fasum f, jenis_fasum j, kecamatan ke WHERE f.id_jenis=j.id_jenis AND f.id_kecamatan=ke.id_kecamatan AND f.id_jenis='$jns'";
$sql = mysql_query ($query);
//Variabel untuk iterasi
$i = 0;
//Mengambil nilai dari query database
while($data=mysql_fetch_row($sql))
{
$cell[$i][0] = $data[0];
$cell[$i][1] = $data[1];
$cell[$i][2] = $data[2];
$cell[$i][3] = $data[3];
$i++;
}

require('fpdf.php');

//memulai pengaturan output PDF
class PDF extends FPDF
{
//untuk pengaturan header halaman
function Header()
{
//Logo
		$this->Image('../images/bappeda2.jpg',20,10);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(120);
		//judul
		$this->Cell(30,10,'STATUS FASILITAS UMUM',0,0,'C');
		$this->Ln(3);
		$this->Cell(120);
		$this->Cell(30,20,'KABUPATEN SUMEDANG',0,0,'C');
		//pindah baris
		$this->Ln(10);
		//buat garis horisontal
		$this->Line(10,30,285,30);
}
function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),285,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}


//pengaturan ukuran kertas
$pdf = new PDF('L','mm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->AliasNbPages();
//Ln() = untuk pindah baris
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(10);
$pdf->Cell(10,8,'No','LRTB',0,'C');
$pdf->Cell(55,8,'Nama','LRTB',0,'C');
$pdf->Cell(100,8,'Alamat','LRTB',0,'C');
$pdf->Cell(45,8,'Kecamatan','LRTB',0,'C');
$pdf->Cell(45,8,'Jenis','LRTB',0,'C');
$pdf->Ln();

$pdf->SetFont('Times','',10);
for($j=0;$j<$i;$j++)
{
//menampilkan data dari hasil query database
$pdf->Cell(10);
$pdf->Cell(10,8,$j+1,'LBTR',0,'C');
$pdf->Cell(55,8,$cell[$j][0],'LBTR',0,'L');
$pdf->Cell(100,8,$cell[$j][1],'LBTR',0,'L');
$pdf->Cell(45,8,$cell[$j][2],'LBTR',0,'C');
$pdf->Cell(45,8,$cell[$j][3],'LBTR',0,'C');
$pdf->Ln();
}



//menampilkan output berupa halaman PDF
$pdf->Output();
?>