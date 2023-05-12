<?php
/*
Filename    : TampilData.php
Programmer  : Raihan Taufiqurrahman
Email       : raihantaufiqurrahman@upi.edu
Deskripsi   : view untuk menampilkan tampilan halaman utama
*/

include("Template.php"); // template
// viewmodel yang digunakan
include("viewmodel/ProsesTiketBioskopAntrian.php");
include("viewmodel/ProsesTiketBioskop.php");
include("viewmodel/ProsesBioskop.php");

class TampilData
{
	private $prosestiketbioskopantrian;
	private $prosestiketbioskop;
	private $prosesbioskop;
	private $tpl;

	function TampilData()
	{
		//konstruktor
		$this->prosestiketbioskopantrian = new ProsesTiketBioskopAntrian();
        $this->prosestiketbioskop = new ProsesTiketBioskop();
		$this->prosesbioskop = new ProsesBioskop();
	}

	function tampil()
	{
		// fungsi untuk menampilkan halaman utama

		$this->prosestiketbioskopantrian->prosesDataTiketBioskopAntrian();
        $this->prosestiketbioskop->prosesDataTiketBioskop();
		$this->prosesbioskop->prosesDataBioskop();
		$dataB = null;
        $dataA = null;
		$dataPilihBioskop = null;

		//semua terkait tampilan adalah tanggung jawab view

		// list select bioskop
		for ($i = 0; $i < $this->prosesbioskop->getSize(); $i++) {
			$dataPilihBioskop .= "<option value='". $i ."'>". $this->prosesbioskop->getIdbioskop($i) ." - ". $this->prosesbioskop->getNamabioskop($i) ."</option>
			";
		}

        // tabel tiket antrian
		for ($i = 0; $i < $this->prosestiketbioskopantrian->getSize(); $i++) {
			$dataB .= "<tr>
			<td>" . $this->prosestiketbioskopantrian->getIdtiket($i) . "</td>
			<td>" . $this->prosestiketbioskopantrian->getJudulfilm($i) . "</td>
			<td>" . $this->prosestiketbioskopantrian->getWaktu($i) . "</td>
			<td>" . $this->prosestiketbioskopantrian->getNamapemesan($i) . "</td>
			<form action='index.php' method='post'>
				<td>
					<input type='hidden' name='tindextiket' value='". $i ."'>
					<select required class='form-control' name='tindexbioskop'>
						<option selected value=''></option>
						DATA_PILIH_BIOSKOP
					</select>
				</td>
				<td>
					<input type='submit' name='pindah' value='Keluar' class='btn btn-success'>
				</td>
			</form>
			";
		}

        // tabel tiket valid
		for ($i = 0; $i < $this->prosestiketbioskop->getSize(); $i++) {
			$dataA .= "<tr>
			<td>" . $this->prosestiketbioskop->getIdtiket($i) . "</td>
			<td>" . $this->prosestiketbioskop->getJudulfilm($i) . "</td>
			<td>" . $this->prosestiketbioskop->getWaktu($i) . "</td>
            <td>" . $this->prosestiketbioskop->getNamapemesan($i) . "</td>
			<td>" . $this->prosestiketbioskop->getIdbioskop($i) . " - ". $this->prosesbioskop->getNamabioskop($i) ."</td>
			";
            
		}


		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL_B", $dataB);
        $this->tpl->replace("DATA_TABEL_A", $dataA);
		$this->tpl->replace("DATA_PILIH_BIOSKOP", $dataPilihBioskop);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function ActionFormTambahTiketAntrian($new_data)
	{
		// menangani ketika form tambah tiket antrian dikirim
		$this->prosestiketbioskopantrian->tambahDataTiketBioskopAntrian($new_data);
	}

	function ActionFormTambahBioskop($new_data)
	{
		// menangani ketika form tambah bioskop dikirim
		$this->prosesbioskop->tambahDataBioskop($new_data);
	}

	function ActionFormPindahTiket($indextiket, $indexbioskop)
	{
		// menangani ketika form untuk memindahkan tiket antrian ke tiket bioskop valid dikirim
		$this->prosestiketbioskopantrian->prosesDataTiketBioskopAntrian();
		$this->prosesbioskop->prosesDataBioskop();

		$data['tidtiket'] = $this->prosestiketbioskopantrian->getIdtiket($indextiket);
		$data['tjudulfilm'] = $this->prosestiketbioskopantrian->getJudulfilm($indextiket);
		$data['twaktu'] = $this->prosestiketbioskopantrian->getWaktu($indextiket);
		$data['tnamapemesan'] = $this->prosestiketbioskopantrian->getNamapemesan($indextiket);
		$data['tidbioskop'] = $this->prosesbioskop->getIdbioskop($indexbioskop);

		$this->prosestiketbioskopantrian->hapusDataTiketBioskopAntrian($data['tidtiket']);
		$this->prosestiketbioskop->tambahDataTiketBioskop($data);
	}
}
