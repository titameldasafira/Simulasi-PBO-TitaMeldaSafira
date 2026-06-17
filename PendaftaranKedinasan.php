<?php
// File: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($data) {
        parent::__construct($data);
        $this->skIkatanDinas = $data['sk_ikatan_dinas'] ?? null;
        $this->instansiSponsor = $data['instansi_sponsor'] ?? null;
    }

    // Implementasi method abstrak dari parent
    public function hitungTotalBiaya() {
        // Contoh logika: Jalur kedinasan ada tambahan biaya matrikulasi/seragam sebesar 50.000
        $biayaTambahan = 50000.00;
        return $this->biayaPendaftaranDasar + $biayaTambahan;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | Instansi: {$this->instansiSponsor} | SK: {$this->skIkatanDinas}";
    }

    // Metode Query Spesifik
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>