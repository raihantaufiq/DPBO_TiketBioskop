<?php
/*
Filename    : TiketBioskopAntrian.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model untuk menampung setiap data Tiket Antrian
*/

class TiketBioskopAntrian
{
	var $idtiket; 
	var $judulfilm;
	var $waktu;
	var $namapemesan;

	function TiketBioskopAntrian($idtiket = '', $judulfilm = '', $waktu = '', $namapemesan = '')
	{
		//konstruktor
		$this->idtiket = $idtiket;
		$this->judulfilm = $judulfilm;
		$this->waktu = $waktu;
		$this->namapemesan = $namapemesan;
	}

	// setter
	function setIdtiket($idtiket) {
		$this->idtiket = $idtiket;
	}

	function setJudulfilm($judulfilm) {
		$this->judulfilm = $judulfilm;
	}

	function setWaktu($waktu) {
		$this->waktu = $waktu;
	}

	function setNamapemesan($namapemesan) {
		$this->namapemesan = $namapemesan;
	}

	// getter
	function getIdtiket() {
		return $this->idtiket;
	}

	function getJudulfilm() {
		return $this->judulfilm;
	}

	function getWaktu() {
		return $this->waktu;
	}

	function getNamapemesan() {
		return $this->namapemesan;
	}
	
}
