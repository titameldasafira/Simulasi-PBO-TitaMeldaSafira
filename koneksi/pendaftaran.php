<?php
// File: Pendaftaran.php

abstract class Pendaftaran {
    // 3. Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Dipetakan dari biaya_pendaftaran_dasar di database

    // Constructor untuk memetakan data langsung dari kolom tabel database
    public function __construct($data) {
        $this->id_pendaftaran = $data['id_pendaftaran'] ?? null;
        $this->nama_calon = $data['nama_calon'] ?? '';
        $this->asal_sekolah = $data['asal_sekolah'] ?? '';
        $this->nilai_ujian = $data['nilai_ujian'] ?? 0.0;
        
        // Memetakan dari kolom 'biaya_pendaftaran_dasar' di MySQL ke properti camelCase
        $this->biayaPendaftaranDasar = $data['biaya_pendaftaran_dasar'] ?? 0.0;
    }

    // Getter (Opsional, agar kelas luar/file cetak bisa membaca properti protected jika dibutuhkan)
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // 4. Metode Abstrak (Tanpa Isi/Body)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>