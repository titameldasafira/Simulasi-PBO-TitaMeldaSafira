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

     /**
     * TAHAP 5: Overriding hitungTotalBiaya() untuk Jalur Kedinasan
     * Total Biaya = biayaPendaftaranDasar * 1.25 (Surcharge administrasi khusus 25%)
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
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