<?php
/*
Filename    : Bioskop.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model untuk menampung setiap data Bioskop
*/

class Bioskop
{
	var $idbioskop; 
	var $namabioskop;
	var $kota;

	function Bioskop($idbioskop = '', $namabioskop = '', $kota = '')
	{
		//konstruktor
		$this->idbioskop = $idbioskop;
		$this->namabioskop = $namabioskop;
		$this->kota = $kota;
	}

	// setter
	function setIdbioskop($idbioskop) {
		$this->idbioskop = $idbioskop;
	}

	function setNamabioskop($namabioskop) {
		$this->namabioskop = $namabioskop;
	}

	function setKota($kota) {
		$this->kota = $kota;
	}

	// getter
	function getIdbioskop() {
		return $this->idbioskop;
	}

	function getNamabioskop() {
		return $this->namabioskop;
	}

	function getKota() {
		return $this->kota;
	}

}
