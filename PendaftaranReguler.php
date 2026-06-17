<?php
// File: PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($data) {
        // Memanggil constructor dari parent class (Pendaftaran)
        parent::__construct($data);
        // Memetakan properti tambahan dari database
        $this->pilihanProdi = $data['pilihan_prodi'] ?? null;
        $this->lokasiKampus = $data['lokasi_campust'] ?? ($data['lokasi_kampus'] ?? null);
    }

    // Implementasi method abstrak dari parent
    public function hitungTotalBiaya() {
        // Contoh perhitungan logika: biaya dasar reguler tanpa potongan/tambahan
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Reguler | Prodi: {$this->pilihanProdi} | Kampus: {$this->lokasiKampus}";
    }

    // Metode Query Spesifik
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>