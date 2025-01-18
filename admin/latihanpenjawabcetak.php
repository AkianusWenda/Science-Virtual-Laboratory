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
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function hari($hari)
{
    $hari = date("D", strtotime($hari));
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}

use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf();
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
$ambil = $koneksi->query("SELECT * FROM kuis  WHERE idkuis='$_GET[id]'");
$data = $ambil->fetch_assoc();
$nomor = 1;
$ambildata = $koneksi->query("SELECT*FROM jawaban where idkuis = '$idkuis'");

// <thead>
// <tr>
// <th rowspan="2">No</th>
// <th rowspan="2">Nama</th>
// <th rowspan="2">NIS</th>
// <th colspan="3">Hasil Evaluasi</th>
// <th rowspan="2">Waktu Submit</th>
// </tr>
// <tr>
// <th>Skor Nilai Benar</th>
// <th>Skor Nilai Salah</th>
// <th>Skor</th>
//     </tr>
// </thead>
// <tbody>';

$html .= '
<div style="padding-left:30px;padding-right:30px">
<center>
<h3 class="judul">DAFTAR JAWABAN</h3>
</center>
<br>
<table border="0">
<tr>
<td>Judul Kuis</td>
<td>: ' . $data['judul'] . '</td>
</tr>
<tr>
<td>Kelompok</td>
<td>: ' . $data['kelompok'] . '</td>
</tr>
<tr>
<td>Hari / Tanggal</td>
<td>: ' . hari($data['tanggal']) . ', ' . tanggal($data['tanggal']) . '</td>
</tr>
</table>
<br>
<br>
<table class="table table-hover" id="tabel" width="100%">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th rowspan="2">Email</th>
<th rowspan="2">No HP</th>
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
$no = 1;
while ($data = $ambildata->fetch_assoc()) {
    $html .= '<tr>
    <td>' . $no . '</td>
    <td>
        ' . $data['nama'] . '
    </td>
    <td>
        ' . $data['email'] . '
    </td>
    <td>
        ' . $data['nohp'] . '
    </td>
<td>
' . $data['benar'] . '
</td>
<td>
' . $data['salah'] . '
</td>
    <td>
    ' . $data['nilai'] . '
</td>
<td>
' . tanggal(date('Y-m-d', strtotime($data['waktu']))) . ' ' . date('H:i', strtotime($data['waktu'])) . '
</td>
</tr>';
    $no++;
}
$html .= '
</tbody>
</table>
</div>
';
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream("data pendaftar.pdf", array("Attachment" => 0));
