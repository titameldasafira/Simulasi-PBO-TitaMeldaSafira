<?php
// File: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($data) {
        parent::__construct($data);
        $this->jenisPrestasi = $data['jenis_prestasi'] ?? null;
        $this->tingkatPrestasi = $data['tingkat_prestasi'] ?? null;
    }

    /**
     * TAHAP 5: Overriding hitungTotalBiaya() untuk Jalur Prestasi
     * Total Biaya = biayaPendaftaranDasar - 50000 (Potongan insentif apresiasi)
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Prestasi: {$this->jenisPrestasi} ({$this->tingkatPrestasi})";
    }

    // Metode Query Spesifik
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>