# 📦 Analisis Data Proyek Gudang Otomatis

## 📊 1. Tujuan Proyek
**Gudang Otomatis** adalah sistem digital untuk:
- Mengelola stok barang masuk dan keluar
- Mengurangi kesalahan manusia (human error)
- Mempercepat proses pengelolaan inventaris
- Memberi visibilitas real-time atas status gudang

---

## 🧱 2. Struktur Data / Entitas

- **Item** (barang)
  - ID
  - Nama
  - Stok
  - Satuan
  - Harga

- **ItemMovement** (mutasi barang)
  - ID
  - item_id
  - jenis_mutasi (`in`, `out`)
  - jumlah
  - tanggal
  - keterangan

---

## 📈 3. Data yang Dapat Dianalisis

### a. Total Stok per Barang
Untuk mengetahui barang mana yang jumlahnya mulai habis:

```sql
SELECT nama, stok FROM items ORDER BY stok ASC;
```

### b. Barang Terbanyak Dimasukkan vs Dikeluarkan
Analisis pergerakan barang paling aktif:

```sql
SELECT item_id, 
  SUM(CASE WHEN jenis_mutasi = 'in' THEN jumlah ELSE 0 END) AS total_masuk,
  SUM(CASE WHEN jenis_mutasi = 'out' THEN jumlah ELSE 0 END) AS total_keluar
FROM item_movements
GROUP BY item_id;
```

### c. Riwayat Mutasi per Hari / Bulan
Untuk meninjau aktivitas operasional gudang:

```sql
SELECT DATE(tanggal) as tanggal, jenis_mutasi, SUM(jumlah) as total
FROM item_movements
GROUP BY DATE(tanggal), jenis_mutasi
ORDER BY tanggal DESC;
```

### d. Prediksi Kekurangan Stok (Threshold Alert)
Jika stok < batas aman → beri notifikasi:

```sql
SELECT nama, stok FROM items WHERE stok < 10;
```

---

## 🧠 4. Insight & Potensi Pengembangan

| Aspek              | Insight / Rekomendasi                                                                 |
|--------------------|---------------------------------------------------------------------------------------|
| Stok Menipis       | Implementasi notifikasi otomatis ketika stok < ambang tertentu                       |
| Mutasi Tidak Normal| Deteksi barang yang sering keluar secara besar, bisa jadi pencurian atau permintaan tinggi |
| Laporan Bulanan    | Buat dashboard grafik mutasi bulanan pakai Chart.js / Laravel Chart / Filament Chart |
| History & Audit    | Catat siapa pengguna yang melakukan mutasi untuk audit trail                         |

---

## 🧾 5. Alat dan Teknologi

- **Laravel + Livewire / Filament** → untuk UI
- **MySQL / MariaDB** → untuk menyimpan data
- **Chart.js atau ApexCharts** → visualisasi data
- **Queue (antrian)** → untuk email notifikasi stok habis
- **Tree/Graph** → untuk relasi kategori / jalur distribusi barang
