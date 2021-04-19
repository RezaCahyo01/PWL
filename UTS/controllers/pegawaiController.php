<?php
session_start();
require_once '../koneksi.php';
require_once '../models/Pegawai.php';

// agar hostname dinamis menyesuaikan nama folder
// $host = $_SERVER['HTTP_HOST'];

// tangkap sumber request (simpan, hapus, atau selain)
$tombol = $_POST['proses'];

$obj = new Pegawai();
switch ($tombol) {
    case 'simpan':
        // 1.tangkap request element form
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $agama = $_POST['agama'];
        $iddivisi = $_POST['iddivisi'];
        $foto = $_POST['foto'];

        // 2.menyimpan data2 di atas sebuah array
        // array dimulai dengan index 0
        $data = [
            $nip,
            $nama, // ? 1
            $email, // ? 2
            $agama,
            $iddivisi,
            $foto
        ];

        // 3.proses simpan data
        // cek apakah ada request element form id
        // jika tidak ada data akan disimpan sebagai data baru
        if (isset($_POST['id'])) {
            $data[] = $_POST['id'];
            $obj->ubah($data);
        } else {
            $obj->simpan($data);
        }
        break;
    case "hapus":
        // 1. menyimpan list id yang akan dihapus kedalam array
        $id[] = $_POST['idx'];

        // 2. proses hapus data
        $obj->hapus($id);
    default:
        // tombol batal
        header("Location:http://localhost/UTS/index.php?hal=dataPegawai");
        break;
}
header("Location:http://localhost/UTS/index.php?hal=dataPegawai");