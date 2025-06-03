<?php

require 'vendor/autoload.php';
include '../koneksi.php';

function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
        case 2:
            return "Februari";
        case 3:
            return "Maret";
        case 4:
            return "April";
        case 5:
            return "Mei";
        case 6:
            return "Juni";
        case 7:
            return "Juli";
        case 8:
            return "Agustus";
        case 9:
            return "September";
        case 10:
            return "Oktober";
        case 11:
            return "November";
        case 12:
            return "Desember";
        default:
            return "";
    }
}

function hari($hari)
{
    $hari = date("D", strtotime($hari));
    switch ($hari) {
        case 'Sun':
            return "Minggu";
        case 'Mon':
            return "Senin";
        case 'Tue':
            return "Selasa";
        case 'Wed':
            return "Rabu";
        case 'Thu':
            return "Kamis";
        case 'Fri':
            return "Jumat";
        case 'Sat':
            return "Sabtu";
        default:
            return "Tidak di ketahui";
    }
}

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

$html = '
<html>
<title>Daftar Penjawab Materi</title>
</html>
<style>
table {
    border-color: #04AA6D;
    border:none;
}

table tr .text2 {
    text-align: right;
    font-size: 16px;
}

table tr .text {
    text-align: center;
    font-size: 16px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

table tr td {
    font-size: 16px;
    padding:7px;
}

table th {
    background-color: #04AA6D;
    padding-top: 10px;
    padding-bottom: 10px;
    color:white;
}

.paragraf {
    line-height: 1.8;
}
</style>';

$idkuis = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$idkuis'");
$data = $ambil->fetch_assoc();

$html .= '
<div style="padding-left:30px;padding-right:30px">
<center>
<h3 class="judul">DAFTAR JAWABAN</h3>
</center>
<br>
<table border="0">
<tr>
<td>Judul Kuis</td>
<td>: ' . htmlspecialchars($data['judul']) . '</td>
</tr>
<tr>
<td>Kelompok</td>
<td>: ' . htmlspecialchars($data['kelompok']) . '</td>
</tr>
<tr>
<td>Hari / Tanggal</td>
<td>: ' . hari($data['tanggal']) . ', ' . tanggal($data['tanggal']) . '</td>
</tr>
</table>
<br><br>
<table class="table table-hover" id="tabel" width="100%">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th rowspan="2">Kelas</th>
<th rowspan="2">Sekolah</th>
<th colspan="3">Hasil Evaluasi</th>
<th rowspan="2">Waktu Submit</th>
</tr>
<tr>
<th>Benar</th>
<th>Salah</th>
<th>Nilai</th>
</tr>
</thead>
<tbody>';

$ambildata = $koneksi->query("SELECT * FROM jawaban WHERE idkuis = '$idkuis'");
$no = 1;
while ($data = $ambildata->fetch_assoc()) {
    $html .= '<tr>
        <td>' . $no . '</td>
        <td>' . htmlspecialchars($data['nama']) . '</td>
        <td>' . htmlspecialchars($data['kelas']) . '</td>
        <td>' . htmlspecialchars($data['sekolah']) . '</td>
        <td>' . htmlspecialchars($data['benar']) . '</td>
        <td>' . htmlspecialchars($data['salah']) . '</td>
        <td>' . htmlspecialchars($data['nilai']) . '</td>
        <td>' . tanggal(date('Y-m-d', strtotime($data['waktu']))) . ' ' . date('H:i', strtotime($data['waktu'])) . '</td>
    </tr>';
    $no++;
}

$html .= '
</tbody>
</table>
</div>
';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("data_pendaftar.pdf", array("Attachment" => 0));
exit;
