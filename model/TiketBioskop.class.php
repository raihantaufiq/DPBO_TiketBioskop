<?php
/*
Filename    : TiketBioskop.class.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : model untuk menampung setiap data Tiket Bioskop Valid
*/

class TiketBioskop
{
	var $idtiket; 
	var $judulfilm;
	var $waktu;
	var $namapemesan;
	var $idbioskop;

	function TiketBioskop($idtiket = '', $judulfilm = '', $waktu = '', $namapemesan = '', $idbioskop = '')
	{
		//konstruktor
		$this->idtiket = $idtiket;
		$this->judulfilm = $judulfilm;
		$this->waktu = $waktu;
		$this->namapemesan = $namapemesan;
		$this->idbioskop = $idbioskop;
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

	function setIdbioskop($idbioskop) {
		$this->idbioskop = $idbioskop;
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

	function getIdbioskop() {
		return $this->idbioskop;
	}
	
}
