<?php
/*
Filename    : ProsesTiketBioskop.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : viewmodel untuk penanganan antara view dan model yang berhubungan dengan Tiket Bioskop
*/

//model yang digunakan
include("model/TabelTiketBioskop.class.php");
include("model/TiketBioskop.class.php");

class ProsesTiketBioskop {

    private $tabeltiketbioskop;
	private $data = [];

    function ProsesTiketBioskop() {
		//konstruktor
		try {
			$this->tabeltiketbioskop = new TabelTiketBioskop();
			$this->data = array(); 
		} catch (Exception $e) {
			echo "error: " . $e->getMessage();
		}
	}

    function prosesDataTiketBioskop() {
		try {
			//mengambil data di tabel
			$this->tabeltiketbioskop->open();
			$this->tabeltiketbioskop->getTiketBioskop();
			while ($row = $this->tabeltiketbioskop->getResult()) {
				//ambil hasil query
				$tiket = new TiketBioskop(); //instansiasi objek
				$tiket->setIdtiket($row['idtiket']); 
                $tiket->setJudulfilm($row['judulfilm']); 
				$tiket->setWaktu($row['waktu']); 
				$tiket->setNamapemesan($row['namapemesan']);
				$tiket->setIdbioskop($row['idbioskop']);

				$this->data[] = $row; //tambahkan data ke dalam list
			}
			//tutup koneksi
			$this->tabeltiketbioskop->close();
		} catch (Exception $e) {
			//memproses error
			echo "error: " . $e->getMessage();
		}
	}
    
	// mengambil data dengan indeks ke i
    function getIdtiket($i) {
		return $this->data[$i]['idtiket'];
	}

	function getJudulfilm($i) {
		return $this->data[$i]['judulfilm'];
	}

	function getWaktu($i) {
		return $this->data[$i]['waktu'];
	}

	function getNamapemesan($i) {
		return $this->data[$i]['namapemesan'];
	}

	function getIdbioskop($i) {
		return $this->data[$i]['idbioskop'];
	}

	// mengambil ukuran data
    function getSize() {
		return sizeof($this->data);
	}


    // fungsi untuk memasukkan data tiket bioskop
    function tambahDataTiketBioskop($new_data) {
		//masukan data baru
		$this->tabeltiketbioskop->open();
		$this->tabeltiketbioskop->insertTiketBioskop($new_data);
		//tutup koneksi
		$this->tabeltiketbioskop->close();
	}

}

?>