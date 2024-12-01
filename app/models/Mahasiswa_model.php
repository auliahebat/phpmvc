<?php

class Mahasiswa_model
{
  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMahasiswa()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getMahasiswaById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = ?');
    $this->db->bind('i', $id);
    return $this->db->single();
  }

  public function tambahDataMahasiswa($data)
  {
    $query = "INSERT INTO mahasiswa (nama, nim, email, jurusan) VALUES (?, ?, ?, ?)";
    $this->db->query($query);

    // Correct usage of bind with the correct type definition string and variables
    $this->db->bind('ssss', $data['nama'], $data['nim'], $data['email'], $data['jurusan']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function hapusDataMahasiswa($id)
  {
    $query = "DELETE FROM mahasiswa WHERE id = ?";
    $this->db->query($query);
    $this->db->bind('i', $id); // 'i' digunakan untuk tipe data integer
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function ubahDataMahasiswa($data)
  {
    $query = "UPDATE mahasiswa SET 
                  nama = ?, 
                  nim = ?, 
                  email = ?, 
                  jurusan = ? 
                WHERE id = ?";

    $this->db->query($query);
    $this->db->bind('ssssi', $data['nama'], $data['nim'], $data['email'], $data['jurusan'], $data['id']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE ?";
    $this->db->query($query);
    $this->db->bind('s', '%' . $keyword . '%');
    return $this->db->resultSet();
  }
}
