<?php
// ==========================================
// 1. STRUKTUR CLASS & MODEL (POLIMORFISME)
// ==========================================
abstract class Pendaftaran {
    public $id;
    public $nama;
    public $asal_sekolah;
    public $nilai_ujian;
    public $biaya_dasar;
    public $pilihan_prodi;
    public $lokasi_kampus;

    public function __construct($id, $nama, $asal_sekolah, $nilai_ujian, $biaya_dasar, $pilihan_prodi, $lokasi_kampus) {
        $this->id = htmlspecialchars($id);
        $this->nama = htmlspecialchars($nama);
        $this->asal_sekolah = htmlspecialchars($asal_sekolah);
        $this->nilai_ujian = (float)$nilai_ujian;
        $this->biaya_dasar = (float)$biaya_dasar;
        $this->pilihan_prodi = htmlspecialchars($pilihan_prodi);
        $this->lokasi_kampus = htmlspecialchars($lokasi_kampus);
    }

    abstract public function tampilkanInfoJalur();
    abstract public function hitungTotalBiaya();
}

class JalurReguler extends Pendaftaran {
    public function tampilkanInfoJalur() {
        return "<strong>Prodi:</strong> " . $this->pilihan_prodi . "<br>" . 
               "<span class='text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded inline-block mt-1 font-medium'>Nilai Ujian: " . $this->nilai_ujian . "</span><br>" . 
               "<span class='text-xs text-gray-500 font-medium'>📍 " . $this->lokasi_kampus . "</span>";
    }
    public function hitungTotalBiaya() {
        return $this->biaya_dasar + 150000;
    }
}

class JalurPrestasi extends Pendaftaran {
    public $jenis_prestasi;
    public $tingkat_prestasi;

    public function __construct($id, $nama, $asal_sekolah, $nilai_ujian, $biaya_dasar, $pilihan_prodi, $lokasi_kampus, $jenis_prestasi, $tingkat_prestasi) {
        parent::__construct($id, $nama, $asal_sekolah, $nilai_ujian, $biaya_dasar, $pilihan_prodi, $lokasi_kampus);
        $this->jenis_prestasi = htmlspecialchars($jenis_prestasi);
        $this->tingkat_prestasi = htmlspecialchars($tingkat_prestasi);
    }
    public function tampilkanInfoJalur() {
        return "<strong>Prodi:</strong> " . $this->pilihan_prodi . "<br>" . 
               "<span class='text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded inline-block mt-1 font-semibold'>🏆 " . $this->tingkat_prestasi . "</span><br>" . 
               "<span class='text-xs text-slate-600 block mt-0.5 italic'>\"" . $this->jenis_prestasi . "\"</span>";
    }
    public function hitungTotalBiaya() {
        return $this->biaya_dasar - 50000;
    }
}

class JalurKedinasan extends Pendaftaran {
    public $sk_ikatan_dinas;
    public $instansi_sponsor;

    public function __construct($id, $nama, $asal_sekolah, $nilai_ujian, $biaya_dasar, $pilihan_prodi, $lokasi_kampus, $sk_ikatan_dinas, $instansi_sponsor) {
        parent::__construct($id, $nama, $asal_sekolah, $nilai_ujian, $biaya_dasar, $pilihan_prodi, $lokasi_kampus);
        $this->sk_ikatan_dinas = htmlspecialchars($sk_ikatan_dinas);
        $this->instansi_sponsor = htmlspecialchars($instansi_sponsor);
    }
    public function tampilkanInfoJalur() {
        return "<strong>Prodi:</strong> " . $this->pilihan_prodi . "<br>" . 
               "<span class='text-xs bg-purple-100 text-purple-800 px-2 py-0.5 rounded inline-block mt-1 font-medium'>🏛️ " . $this->instansi_sponsor . "</span><br>" . 
               "<span class='text-[11px] text-gray-500 font-mono block mt-0.5'>" . $this->sk_ikatan_dinas . "</span>";
    }
    public function hitungTotalBiaya() {
        return $this->biaya_dasar + 350000;
    }
}

// ==========================================
// 2. DATA MASTER DARI DUMP DATABASE
// ==========================================
$list_reguler = [
    new JalurReguler(1, "Ahmad Fauzi", "SMA Negeri 1 Jakarta", 85.50, 250000.00, "Teknik Informatika", "Kampus Utama"),
    new JalurReguler(2, "Siti Aminah", "SMA Negeri 3 Bandung", 88.25, 250000.00, "Sistem Informasi", "Kampus Utama"),
    new JalurReguler(3, "Budi Santoso", "SMK Negeri 2 Surabaya", 80.00, 250000.00, "Teknik Elektro", "Kampus B"),
    new JalurReguler(4, "Citra Lestari", "SMA Kristen Yusuf", 91.10, 250000.00, "Kedokteran", "Kampus Utama"),
    new JalurReguler(5, "Dedi Wijaya", "SMA Negeri 5 Semarang", 78.45, 250000.00, "Manajemen", "Kampus B"),
    new JalurReguler(6, "Eka Putri", "SMA Negeri 1 Yogyakarta", 86.70, 250000.00, "Akuntansi", "Kampus B"),
    new JalurReguler(7, "Fajar Ramadhan", "MA Negeri 2 Malik", 83.90, 250000.00, "Hukum", "Kampus Utama")
];

$list_prestasi = [
    new JalurPrestasi(8, "Gita Gutawa", "SMA Negeri 8 Jakarta", 92.00, 150000.00, "Ilmu Komunikasi", "Kampus Utama", "Olimpiade Sains Matematika", "Nasional"),
    new JalurPrestasi(9, "Hendra Setiawan", "SMA Olahraga Ragunan", 79.50, 150000.00, "Pendidikan Olahraga", "Kampus B", "Bulutangkis Tunggal Putra", "Internasional"),
    new JalurPrestasi(10, "Indah Permata", "SMA Negeri 1 Surakarta", 89.80, 150000.00, "Sastra Inggris", "Kampus Utama", "Debat Bahasa Inggris", "Provinsi"),
    new JalurPrestasi(11, "Kevin Sanjaya", "SMA Kristen Petra", 81.00, 150000.00, "Manajemen Bisnis", "Kampus B", "Bulutangkis Ganda Putra", "Internasional"),
    new JalurPrestasi(12, "Lesti Kejora", "SMA Negeri 1 Ciawi", 85.00, 150000.00, "Seni Musik", "Kampus Utama", "FLS2N Menyanyi Solo", "Nasional"),
    new JalurPrestasi(13, "Muhammad Ali", "MA Negeri 1 Medan", 94.30, 150000.00, "Teknik Kimia", "Kampus Utama", "Karya Tulis Ilmiah", "Nasional"),
    new JalurPrestasi(14, "Nadia Vega", "SMA Negeri 2 Padang", 88.00, 150000.00, "Arsitektur", "Kampus Utama", "Lomba Menggambar Sketsa", "Provinsi")
];

$list_kedinasan = [
    new JalurKedinasan(15, "Oki Setiana", "SMA Negeri 1 Makassar", 87.20, 300000.00, "Ilmu Pemerintahan", "Kampus Utama", "SK-IKATAN-001/2026", "Kementerian Dalam Negeri"),
    new JalurKedinasan(16, "Putra Perkasa", "SMA Taruna Nusantara", 90.15, 300000.00, "Teknik Sipil Siber", "Kampus Utama", "SK-IKATAN-002/2026", "Badan Siber dan Sandi Negara"),
    new JalurKedinasan(17, "Qori Sandioriva", "SMA Negeri 3 Monokwari", 82.60, 300000.00, "Administrasi Publik", "Kampus B", "SK-IKATAN-003/2026", "Pemerintah Daerah Papua"),
    new JalurKedinasan(18, "Rian Agung", "SMK Kehutanan Samarinda", 84.10, 300000.00, "Manajemen Hutan", "Kampus C", "SK-IKATAN-004/2026", "Kementerian LHK"),
    new JalurKedinasan(19, "Sinta Bella", "SMA Negeri 1 Pontianak", 86.40, 300000.00, "Statistika Keuangan", "Kampus Utama", "SK-IKATAN-005/2026", "Badan Pusat Statistik"),
    new JalurKedinasan(20, "Taufik Hidayat", "SMA Negeri 4 Bandung", 89.00, 300000.00, "Teknik Telekomunikasi", "Kampus Utama", "SK-IKATAN-006/2026", "Kementerian Kominfo"),
    new JalurKedinasan(21, "Utami Dewi", "SMA Negeri 1 Denpasar", 91.50, 300000.00, "Akuntansi Sektor Publik", "Kampus Utama", "SK-IKATAN-007/2026", "Kementerian Keuangan")
];

// LOGIKA MENENTUKAN JALUR MANA YANG SEDANG DIPILIH USER (Default: reguler)
$jalur_terpilih = isset($_GET['jalur']) ? $_GET['jalur'] : 'reguler';

// Filter data array objek berdasarkan parameter menu pilihan terpilih
if ($jalur_terpilih === 'prestasi') {
    $data_tabel = $list_prestasi;
    $judul_tabel = "JALUR PRESTASI";
    $aksen_warna = "border-emerald-600";
    $badge_warna = "bg-emerald-600";
} elseif ($jalur_terpilih === 'kedinasan') {
    $data_tabel = $list_kedinasan;
    $judul_tabel = "JALUR KEDINASAN";
    $aksen_warna = "border-purple-600";
    $badge_warna = "bg-purple-600";
} else {
    $data_tabel = $list_reguler;
    $judul_tabel = "JALUR REGULER";
    $aksen_warna = "border-blue-600";
    $badge_warna = "bg-blue-600";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Seleksi PMB</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased">

    <header class="bg-slate-900 text-white border-b-4 border-amber-500 shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold tracking-wide text-amber-400">PORTAL PMB UTAMA</h1>
                <p class="text-xs text-slate-300 mt-0.5">Sistem Monitoring Seleksi Mahasiswa Berdasarkan Klasifikasi Jalur</p>
            </div>
            <div class="bg-slate-800 px-4 py-2 rounded text-xs text-slate-400 border border-slate-700 font-mono">
                db_simulasi_pbo_ti1c_titameldasafira
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">

        <section class="mb-8">
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Pilih Kategori Jalur Pendaftaran :</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                
                <a href="?jalur=reguler" class="flex items-center justify-between p-4 rounded-xl border transition-all duration-150 <?= $jalur_terpilih === 'reguler' ? 'bg-blue-50 border-blue-500 text-blue-900 ring-2 ring-blue-200 shadow-sm font-bold' : 'bg-white border-gray-200 hover:bg-gray-50 text-gray-700 font-medium' ?>">
                    <span class="flex items-center gap-3 text-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                        1. Jalur Reguler
                    </span>
                    <span class="text-xs font-mono px-2 py-0.5 rounded bg-slate-200/60 text-slate-700 font-bold"><?= count($list_reguler) ?> Mhs</span>
                </a>

                <a href="?jalur=prestasi" class="flex items-center justify-between p-4 rounded-xl border transition-all duration-150 <?= $jalur_terpilih === 'prestasi' ? 'bg-emerald-50 border-emerald-500 text-emerald-900 ring-2 ring-emerald-200 shadow-sm font-bold' : 'bg-white border-gray-200 hover:bg-gray-50 text-gray-700 font-medium' ?>">
                    <span class="flex items-center gap-3 text-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                        2. Jalur Prestasi
                    </span>
                    <span class="text-xs font-mono px-2 py-0.5 rounded bg-slate-200/60 text-slate-700 font-bold"><?= count($list_prestasi) ?> Mhs</span>
                </a>

                <a href="?jalur=kedinasan" class="flex items-center justify-between p-4 rounded-xl border transition-all duration-150 <?= $jalur_terpilih === 'kedinasan' ? 'bg-purple-50 border-purple-500 text-purple-900 ring-2 ring-purple-200 shadow-sm font-bold' : 'bg-white border-gray-200 hover:bg-gray-50 text-gray-700 font-medium' ?>">
                    <span class="flex items-center gap-3 text-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                        3. Jalur Kedinasan
                    </span>
                    <span class="text-xs font-mono px-2 py-0.5 rounded bg-slate-200/60 text-slate-700 font-bold"><?= count($list_kedinasan) ?> Mhs</span>
                </a>

            </div>
        </section>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <div class="bg-slate-900 px-6 py-4 text-white flex justify-between items-center border-b-4 <?= $aksen_warna ?>">
                <h3 class="font-bold tracking-wide flex items-center gap-2 text-sm md:text-base">
                    <span class="px-2 py-0.5 <?= $badge_warna ?> text-[10px] rounded uppercase font-bold font-mono text-white">FILTERED RESULT</span>
                    DATA CALON MAHASISWA - <?= $judul_tabel ?>
                </h3>
                <span class="text-xs bg-slate-800 font-mono px-3 py-1 rounded text-amber-400 font-bold">Terdisplay: <?= count($data_tabel) ?> Baris</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 uppercase text-xs font-semibold tracking-wider border-b border-gray-200">
                            <th class="py-3.5 px-6 w-20">ID</th>
                            <th class="py-3.5 px-6">Nama Lengkap</th>
                            <th class="py-3.5 px-6">Asal Sekolah</th>
                            <th class="py-3.5 px-6">Atribut Spesifik (Polimorfik)</th>
                            <th class="py-3.5 px-6 text-right">Kalkulasi Akhir (Polimorfik)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if (count($data_tabel) > 0): ?>
                            <?php foreach($data_tabel as $mhs): ?>
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="py-4 px-6 font-mono font-medium text-slate-500 text-xs">#<?= $mhs->id ?></td>
                                <td class="py-4 px-6 font-bold text-slate-900"><?= $mhs->nama ?></td>
                                <td class="py-4 px-6 text-gray-600 text-xs font-medium"><?= $mhs->asal_sekolah ?></td>
                                <td class="py-4 px-6 text-gray-700 leading-relaxed text-xs"><?= $mhs->tampilkanInfoJalur() ?></td>
                                <td class="py-4 px-6 text-right font-mono font-bold text-slate-900 text-xs">
                                    Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.') ?>
                                    <?php if($jalur_terpilih === 'prestasi'): ?>
                                        <span class="text-[10px] block font-sans font-normal text-emerald-500">(Termasuk Potongan)</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400 font-medium">Tidak ada data untuk jalur ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="bg-slate-900 text-slate-400 text-center py-6 mt-24 text-xs border-t border-slate-800">
        <p>&copy; 2026 Admin Panel PMB. Desain Antarmuka Menubar Pilah Kategori Jalur Terintegrasi.</p>
    </footer>

</body>
</html>

```