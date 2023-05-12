<?php
/*
Filename    : ProsesTiketBioskopAntrian.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : viewmodel untuk penanganan antara view dan model yang berhubungan dengan Tiket Antrian
*/

//model yang digunakan
include("model/TabelTiketBioskopAntrian.class.php");
include("model/TiketBioskopAntrian.class.php");

class ProsesTiketBioskopAntrian {

    private $tabeltiketbioskopantrian;
	private $data = [];

    function ProsesTiketBioskopAntrian() {
		//konstruktor
		try {
			$this->tabeltiketbioskopantrian = new TabelTiketBioskopAntrian();
			$this->data = array(); 
		} catch (Exception $e) {
			echo "error: " . $e->getMessage();
		}
	}

    function prosesDataTiketBioskopAntrian() {
		try {
			//mengambil data di tabel
			$this->tabeltiketbioskopantrian->open();
			$this->tabeltiketbioskopantrian->getTiketBioskopAntrian();
			while ($row = $this->tabeltiketbioskopantrian->getResult()) {
				//ambil hasil query
				$tiketantrian = new TiketBioskopAntrian(); //instansiasi objek
				$tiketantrian->setIdtiket($row['idtiket']); 
                $tiketantrian->setJudulfilm($row['judulfilm']); 
				$tiketantrian->setWaktu($row['waktu']); 
				$tiketantrian->setNamapemesan($row['namapemesan']); 

				$this->data[] = $row; //tambahkan data ke dalam list
			}
			//tutup koneksi
			$this->tabeltiketbioskopantrian->close();
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

	// mengambil ukuran data
    function getSize() {
		return sizeof($this->data);
	}


    // fungsi untuk memasukkan data tiket antrian
    function tambahDataTiketBioskopAntrian($new_data) {
		//masukan data baru
		$this->tabeltiketbioskopantrian->open();
		$this->tabeltiketbioskopantrian->insertTiketBioskopAntrian($new_data);
		//tutup koneksi
		$this->tabeltiketbioskopantrian->close();
	}
    
	// fungsi untuk menghapus data tiket antrian
	function hapusDataTiketBioskopAntrian($id) {
		//hapus data berdasarkan id
		$this->tabeltiketbioskopantrian->open();
		$this->tabeltiketbioskopantrian->deleteTiketBioskopAntrian($id);
		//tutup koneksi
		$this->tabeltiketbioskopantrian->close();
	}

}

?>