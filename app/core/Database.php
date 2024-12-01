<?php

class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $name = DB_NAME;

  private $dbh;
  private $stmt;

  public function __construct()
  {
    try {
      // Membuat koneksi
      $this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->name);

      // Cek jika ada error
      if ($this->dbh->connect_error) {
        throw new Exception("Koneksi gagal: " . $this->dbh->connect_error);
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($types, ...$values)
  {
    // Use spread operator to bind values dynamically
    $this->stmt->bind_param($types, ...$values);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  public function resultSet()
  {
    // Eksekusi pernyataan terlebih dahulu
    $this->stmt->execute();

    // Pastikan hasilnya didapatkan
    $result = $this->stmt->get_result();

    // Kembalikan semua data sebagai array asosiatif
    return $result->fetch_all(MYSQLI_ASSOC);
  }


  public function single()
  {
    // Menjalankan query dan mendapatkan hasil
    $this->stmt->execute();
    $result = $this->stmt->get_result(); // Mendapatkan hasil dari query

    // Mengembalikan hasil sebagai array asosiasi
    return $result->fetch_assoc();
  }

  public function rowCount()
  {
    return $this->stmt->affected_rows;
  }
}
