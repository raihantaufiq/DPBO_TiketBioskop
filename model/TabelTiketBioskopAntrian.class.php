<?php
/*
Filename    : TabelTiketBioskopAntrian.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model untuk mengakses tabel ttiketbioskopantrian
*/

include_once("DB.class.php");

class TabelTiketBioskopAntrian extends DB
{
	function getTiketBioskopAntrian()
	{
		// Query
		$query = "SELECT * FROM ttiketbioskopantrian";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function insertTiketBioskopAntrian($data)
	{
		$judulfilm = $data['tjudulfilm'];
		$waktu = $data['twaktu'];
		$namapemesan = $data['tnamapemesan'];

		// Query mysql
		$query = "INSERT INTO ttiketbioskopantrian VALUES ('', '$judulfilm', '$waktu', '$namapemesan')";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteTiketBioskopAntrian($id)
	{
		// Query mysql
		$query = "DELETE FROM ttiketbioskopantrian WHERE idtiket = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	
}
