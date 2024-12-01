$(function () {
  // Event ketika tombol "Ubah" diklik
  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah Data Mahasiswa"); // Ubah judul modal
    $(".modal-footer button[type=submit]").html("Ubah Data"); // Ubah teks tombol submit
    $(".modal-body form").attr("action", "http://phpmvc.test/mahasiswa/ubah"); // Pastikan action diarahkan ke endpoint "ubah"

    // Ambil ID dari atribut data-id
    const id = $(this).data("id");

    // Lakukan request AJAX untuk mengambil data mahasiswa
    $.ajax({
      url: "http://phpmvc.test/mahasiswa/getubah", // Endpoint mengambil data
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        // Isi form dengan data dari response
        $("#nama").val(data.nama);
        $("#nim").val(data.nim);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
      error: function () {
        alert("Gagal mengambil data. Pastikan endpoint benar.");
      },
    });
  });

  // Event ketika tombol "Tambah" diklik
  $(".tombolTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah Data Mahasiswa"); // Ubah judul modal
    $(".modal-footer button[type=submit]").html("Tambah Data"); // Ubah teks tombol submit
    $(".modal-body form").attr("action", "http://phpmvc.test/mahasiswa/tambah"); // Reset action form

    // Kosongkan form untuk tambah data baru
    $("#nama").val("");
    $("#nim").val("");
    $("#email").val("");
    $("#jurusan").val("");
    $("#id").val("");
  });
});
