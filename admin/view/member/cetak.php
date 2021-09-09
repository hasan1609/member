<?php
require_once __DIR__ . '../../../vendor/autoload.php';
require 'proses.php';
$query = query("SELECT * FROM user");

$mpdf = new Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
$html =
    '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
</head>

<body>
<h1 style="text-align: center;">Data Member</h1>
<style>
    td, th{
        border: 1px solid black;
        padding: 3px;
    }
</style>
<table style="width: 50%; margin:auto; border-collapse: collapse">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Tgl. Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Tlp</th>
        <th>Alamat</th>
        <th>Orang Tua</th>
        <th>Tlp.Orang Tua</th>
        <th>Jurusan</th>
        <th>Jabatan</th>
        <th>Thn Masuk Matan</th>
        <th>Angkatan PPAM</th>
        <th>Angkatan Taman Cinta</th>
        <th>Seragam</th>
    </tr>';
$no = 1;
foreach ($query as $data) {
    $html .= '<tr>
    <td>' . $no++ . '</td>
    <td>' . $data['nama'] . '</td>
    <td>' . $data['email'] . '</td>
    <td>' . $data['ttl'] . '</td>
    <td>' . strtolower($data['kelamin']) . '</td>
    <td>' . $data['nohp'] . '</td>
    <td>' . $data['alamat'] . '</td>
    <td>' . $data['ortu'] . '</td>
    <td>' . $data['tlp_ortu'] . '</td>
    <td>' . $data['jurusan'] . '</td>
    <td>' . $data['jabatan'] . '</td>
    <td>' . $data['thn_matan'] . '</td>
    <td>' . $data['thn_ppam'] . '</td>
    <td>' . $data['taman_cinta'] . '</td>
    <td>' . $data['seragam'] . '</td>
    </tr>';
}
$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-member.pdf', 'I');
