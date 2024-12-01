<div class="container mt-5">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Mahasiswa
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <form action="/mahasiswa/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Mahasiswa.." aria-describedby="button-addon2" name="keyword" id="keyword">
          <button class="btn btn-outline-secondary"
            type="submit" id="tombolCari" autocomplete="off">Cari</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-6">

      <h3>Daftar Mahasiswa</h3>
      <ul class="list-group mt-4">
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= $mhs['nama']; ?>
            <div>
              <a class="btn btn-outline-primary btn-sm"
                href="/mahasiswa/detail/<?= $mhs['id'] ?>" role="button">Detail</a>
              <a class="btn btn-outline-warning btn-sm tampilModalUbah"
                href="#" data-id="<?= $mhs['id']; ?>" data-bs-toggle="modal" data-bs-target="#formModal">Ubah</a>
              <a class="btn btn-outline-danger btn-sm"
                href="/mahasiswa/hapus/<?= $mhs['id'] ?>" role="button" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </div>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form action="/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
          </div>
          <label for="jurusan" class="form-label">Jurusan</label>
          <select class="form-select" id="jurusan" name="jurusan" required>
            <option selected disabled value="">Pilih Jurusan</option>
            <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>