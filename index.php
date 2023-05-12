<?php

// view yang digunakan
include("view/TampilData.php");

$tp = new TampilData();

if (isset($_POST['antrian'])) {
    // jika form tambah tiket antrian dikirim
    $data['tjudulfilm'] = $_POST['tjudulfilm'];
    $data['twaktu'] = $_POST['twaktu'];
    $data['tnamapemesan'] = $_POST['tnamapemesan'];

    $tp->ActionFormTambahTiketAntrian($data);
    header("location: index.php");

}else if (isset($_POST['bioskop'])){
    // jika form tambah bioskop dikirim
    $data['tnamabioskop'] = $_POST['tnamabioskop'];
    $data['tkota'] = $_POST['tkota'];

    $tp->ActionFormTambahBioskop($data);
    header("location: index.php");

}else if (isset($_POST['pindah'])){
    // jika form untuk memindahkan tiket antrian ke tiket bioskop valid dikirim
    $tp->ActionFormPindahTiket($_POST['tindextiket'], $_POST['tindexbioskop']);
    header("location: index.php");

}

// menampilkan halaman utama
$tp->tampil();
