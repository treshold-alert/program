<style>
    /* Latar belakang utama area konten */
.report-content-area {
  padding: 0 7rem;
  /* background-color: #f4f7f6; Warna abu-abu muda seperti di gambar */
  font-family: Arial, sans-serif; /* Font dasar */
}

/* Class dasar untuk kotak putih (Prediksi & Laporan) 
  (Pengganti .card Bootstrap)
*/
.prediction-summary-box,
.data-report-box {
  background-color: #ffffff;
  border: 1px solid #e9ecef;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
  margin-bottom: 1.5rem;
  overflow: hidden; /* Menjaga sudut melengkung */
}

/* Header untuk kotak prediksi */
.summary-box-header {
  display: flex;
  align-items: center;
  padding: 1rem 1.25rem;
  /* (Tidak ada border bawah di kotak prediksi) */
}
.summary-box-icon {
  font-size: 1.25rem;
  margin-right: 0.75rem;
}
.summary-box-title {
  font-size: 1.15rem;
  font-weight: 600;
  color: #333;
  margin: 0;
}

/* Body untuk kotak prediksi */
.summary-box-body {
  padding: 1.25rem;
}
.summary-box-text {
  font-size: 0.95rem;
  color: #555;
  margin-top: 0;
  margin-bottom: 1.5rem;
}

/* Kotak detail biru di dalam prediksi */
.prediction-detail-box {
  display: flex;
  align-items: center;
  background-color: #e6f7ff; /* Latar biru muda */
  border: 1px solid #b3e0ff; /* Border biru */
  border-radius: 8px;
  padding: 1rem;
}
.prediction-detail-icon {
  font-size: 1.5rem;
  margin-right: 1rem;
}
.prediction-detail-content {
  display: flex;
  flex-direction: column;
}
.prediction-detail-label {
  font-size: 0.9rem;
  color: #0366d6;
  font-weight: 500;
}
.prediction-detail-value {
  font-size: 1.75rem;
  font-weight: bold;
  color: #0366d6;
}

/* Bilah Filter (Filter dan Tombol) */
.report-filter-bar {
  display: flex;
  flex-wrap: wrap; /* Agar responsif di layar kecil */
  align-items: center;
  margin-bottom: 1.5rem;
  gap: 1rem; /* Jarak antar item */
}
.filter-group {
  display: flex;
  align-items: center;
}
.filter-label {
  margin-right: 0.5rem;
  font-weight: 500;
  font-size: 0.9rem;
  color: #444;
}
.filter-input-field {
  padding: 0.6rem 0.75rem;
  border: 1px solid #ced4da;
  border-radius: 5px;
  font-size: 0.9rem;
}
.action-button-group {
  margin-left: auto; /* Mendorong tombol ke kanan */
  display: flex;
  gap: 0.5rem;
}

/* Tombol Aksi (Pengganti .btn Bootstrap) */
.report-action-btn {
  padding: 0.6rem 1.25rem;
  border: none;
  border-radius: 5px;
  color: #ffffff;
  font-weight: bold;
  font-size: 0.9rem;
  cursor: pointer;
  transition: background-color 0.2s;
}
.report-action-btn.primary-btn {
  background-color: #dc3545; /* Merah */
}
.report-action-btn.primary-btn:hover {
  background-color: #c82333; /* Merah lebih gelap */
}
.report-action-btn.secondary-btn {
  background-color: #dc3545; /* Merah (sesuai gambar) */
}
.report-action-btn.secondary-btn:hover {
  background-color: #c82333; /* Merah lebih gelap */
}


/* Header untuk kotak Laporan (Tabel) */
.report-box-header {
  display: flex;
  align-items: center;
  padding: 1rem 1.25rem;
  border-bottom: 1px solid #e9ecef; /* Garis pemisah */
}
.report-box-icon {
  font-size: 1.25rem;
  margin-right: 0.75rem;
}
.report-box-title {
  font-size: 1.15rem;
  font-weight: 600;
  color: #333;
  margin: 0;
}

/* Wrapper Tabel agar responsif */
.report-table-wrapper {
  overflow-x: auto; /* Tambahkan scroll horizontal di layar kecil */
}

/* Tabel (Pengganti .table) */
.data-results-table {
  width: 100%;
  border-collapse: collapse; /* Hilangkan spasi antar border */
  font-size: 0.9rem;
}

/* Sel Header Tabel (Pengganti th) */
.table-header-custom .table-cell-custom {
  background-color: #f8f9fa; /* Latar header abu-abu muda */
  font-weight: 600;
  color: #495057;
  text-align: left;
  padding: 0.85rem 1rem;
  border-bottom: 2px solid #dee2e6;
  white-space: nowrap; /* Mencegah header terpotong */
}

/* Sel Body Tabel (Pengganti td) */
.table-body-custom .table-cell-custom {
  padding: 0.85rem 1rem;
  border-top: 1px solid #e9ecef; /* Garis pemisah antar baris */
  color: #212529;
  white-space: nowrap;
}

/* Efek belang-belang (Pengganti .table-striped) */
.table-body-custom .table-row-custom:nth-of-type(even) {
  background-color: #f8f9fa; /* Warna belang */
}

.report-section{
  width: 100%;
  margin-top: 2rem;
}
</style>

<section id="hero" class="report-section">
  <div class="report-content-area">

    {{-- 📦 Prediksi Stok Barang --}}
    <div class="prediction-summary-box">
      <div class="summary-box-header">
        <span class="summary-box-icon">📦</span> 
        <h3 class="summary-box-title">Prediksi Stok Barang</h3>
      </div>

      <div class="summary-box-body">
        @if ($topPrediction)
          <p class="summary-box-text">
            Produk <strong>{{ $topPrediction['name'] }}</strong> keluar sebanyak 
            <strong>{{ $topPrediction['total_keluar'] }}</strong> unit.
          </p>

          <div class="prediction-detail-box">
            <div class="prediction-detail-icon">
              <span>📈</span>
            </div>
            <div class="prediction-detail-content">
              <span class="prediction-detail-label">Prediksi</span>
              <span class="prediction-detail-value">{{ $topPrediction['predicted_stock'] }}</span>
            </div>
          </div>
        @else
          <p class="summary-box-text text-muted">
            Tidak ada data transaksi keluar untuk bulan ini.
          </p>
        @endif
      </div>
    </div>

    {{-- 🔎 Filter Bulan & Aksi --}}
    <form action="{{ route('products.reportedFactory') }}" method="GET" class="report-filter-bar">
      <div class="filter-group">
        <label for="filterBulan" class="filter-label">Filter Bulan:</label>
        <input 
          type="month" 
          id="filterBulan" 
          name="bulan" 
          value="{{ request('bulan') }}" 
          class="filter-input-field" 
          required
        >
      </div>
      <div class="action-button-group">
        <button type="submit" class="report-action-btn primary-btn">TAMPILKAN</button>
        @if (request('bulan'))
          <a 
            href="{{ route('products.average.pdf', ['bulan' => request('bulan')]) }}" 
            class="report-action-btn secondary-btn"
          >
            CETAK PDF
          </a>
        @endif
      </div>
    </form>

    {{-- 📊 Laporan Stok Barang --}}
    <div class="data-report-box">
      <div class="report-box-header">
        <span class="report-box-icon">📄</span>
        <h3 class="report-box-title">Laporan Stok Barang</h3>
      </div>

      <div class="report-table-wrapper">
        @if ($report->isNotEmpty())
          <table class="data-results-table">
            <thead class="table-header-custom">
              <tr class="table-row-custom">
                <th class="table-cell-custom">KODE</th>
                <th class="table-cell-custom">NAMA BARANG</th>
                <th class="table-cell-custom">JUMLAH MASUK</th>
                <th class="table-cell-custom">JUMLAH KELUAR</th>
                <th class="table-cell-custom">SISA STOK</th>
              </tr>
            </thead>
            <tbody class="table-body-custom">
              @foreach ($report as $item)
                <tr class="table-row-custom">
                  <td class="table-cell-custom">{{ $item['code'] }}</td>
                  <td class="table-cell-custom">{{ $item['name'] }}</td>
                  <td class="table-cell-custom">{{ $item['masuk'] }}</td>
                  <td class="table-cell-custom">{{ $item['keluar'] }}</td>
                  <td class="table-cell-custom">{{ $item['stock'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p class="text-muted text-center py-3">
            Belum ada data laporan stok untuk bulan ini.
          </p>
        @endif
      </div>
    </div>

  </div>
</section>

