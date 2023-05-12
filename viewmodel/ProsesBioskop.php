<?php
/*
Filename    : ProsesBioskop.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : viewmodel untuk penanganan antara view dan model yang berhubungan dengan Bioskop
*/

//model yang digunakan
include("model/TabelBioskop.class.php");
include("model/Bioskop.class.php");

class ProsesBioskop {

    private $tabelbioskop;
	private $data = [];

    function ProsesBioskop() {
		//konstruktor
		try {
			$this->tabelbioskop = new TabelBioskop();
			$this->data = array(); 
		} catch (Exception $e) {
			echo "error: " . $e->getMessage();
		}
	}

    function prosesDataBioskop() {
		try {
			//mengambil data di tabel
			$this->tabelbioskop->open();
			$this->tabelbioskop->getBioskop();
			while ($row = $this->tabelbioskop->getResult()) {
				//ambil hasil query
				$bioskop = new Bioskop(); //instansiasi objek
				$bioskop->setIdbioskop($row['idbioskop']); 
                $bioskop->setNamabioskop($row['namabioskop']); 
				$bioskop->setKota($row['kota']);

				$this->data[] = $row; //tambahkan data ke dalam list
			}
			//tutup koneksi
			$this->tabelbioskop->close();
		} catch (Exception $e) {
			//memproses error
			echo "error: " . $e->getMessage();
		}
	}
    
	// mengambil data dengan indeks ke i
    function getIdbioskop($i) {
		return $this->data[$i]['idbioskop'];
	}

	function getNamabioskop($i) {
		return $this->data[$i]['namabioskop'];
	}

	function getKota($i) {
		return $this->data[$i]['kota'];
	}

	// mengambil ukuran data
    function getSize() {
		return sizeof($this->data);
	}

	// fungsi untuk memasukkan data bioskop
    function tambahDataBioskop($new_data) {

		try {
			//mengambil data berdasarkan nama bioskop
			$this->tabelbioskop->open();
			$this->tabelbioskop->getBioskop_byNama($new_data['tnamabioskop']);
			list($row['idbioskop'], $row['namabioskop'], $row['kota']) = $this->tabelbioskop->getResult();
			
			//tutup koneksi
			$this->tabelbioskop->close();
		} catch (Exception $e) {
			//memproses error
			echo "error: " . $e->getMessage();
		}

		// cek apakah nama bioskop sudah ada
		if ($new_data['tnamabioskop'] == $row['namabioskop']) {
			// jika ada maka update data
			$this->tabelbioskop->open();
			$this->tabelbioskop->updateBioskop($new_data);
			//tutup koneksi
			$this->tabelbioskop->close();

		}else {
			//jika tidak ada maka masukan data baru
			$this->tabelbioskop->open();
			$this->tabelbioskop->insertBioskop($new_data);
			//tutup koneksi
			$this->tabelbioskop->close();
		}

	}

}

?>