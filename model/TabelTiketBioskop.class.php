<?php
/*
Filename    : TabelTiketBioskop.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model untuk mengakses tabel ttiketbioskop
*/

include_once("DB.class.php");

class TabelTiketBioskop extends DB
{
	function getTiketBioskop()
	{
		// Query
		$query = "SELECT * FROM ttiketbioskop";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function insertTiketBioskop($data)
	{
		$idtiket = $data['tidtiket'];
		$judulfilm = $data['tjudulfilm'];
		$waktu = $data['twaktu'];
		$namapemesan = $data['tnamapemesan'];
		$idbioskop = $data['tidbioskop'];

		// Query mysql
		$query = "INSERT INTO ttiketbioskop VALUES ('$idtiket', '$judulfilm', '$waktu', '$namapemesan', '$idbioskop')";
		// Mengeksekusi query
		return $this->execute($query);
	}
	
}
