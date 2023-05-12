<?php

/*
Filename    : TabelBioskop.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model untuk mengakses tabel tbioskop
*/

include_once("DB.class.php");

class TabelBioskop extends DB
{
	function getBioskop()
	{
		// Query
		$query = "SELECT * FROM tbioskop";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getBioskop_byNama($namabioskop)
	{
		// Query
		$query = "SELECT * FROM tbioskop WHERE namabioskop='$namabioskop'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function insertBioskop($data)
	{
		$namabioskop = $data['tnamabioskop'];
		$kota = $data['tkota'];
		
		// Query mysql
		$query = "INSERT INTO tbioskop VALUES ('', '$namabioskop', '$kota')";
		// Mengeksekusi query
		return $this->execute($query);
	}

    function updateBioskop($data)
	{
		$namabioskop = $data['tnamabioskop'];
		$kota = $data['tkota'];
		
		// Query mysql
		$query = "UPDATE tbioskop SET kota='$kota' WHERE namabioskop='$namabioskop'";
		// Mengeksekusi query
		return $this->execute($query);
	}
	
}
