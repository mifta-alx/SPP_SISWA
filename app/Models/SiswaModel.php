<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{

    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    protected $allowedFields = [
        'nisn',
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'no_telp',
        'id_spp',
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function getData($id_kelas = [], $id_spp = [], $nama_kelas = [] )
    {
        if ($id_kelas) {
            $this->builder()->whereIn('id_kelas', $id_kelas);
        }
        if ($id_spp) {
            $this->builder()->whereIn('id_spp', $id_spp);
        }
        if ($nama_kelas) {
            $this->builder()->whereIn('nama_kelas', $nama_kelas);
        }
        return $this->findAll();
    }
    public function id_kelas()
    {
        return $this->db->table('kelas')->distinct()->select('id_kelas')->get()->getResultArray();
    }
    public function id_spp()
    {
        return $this->db->table('spp')->distinct()->select('id_spp')->get()->getResultArray();
    }
    public function getById($id)
    {
        return $this->db->table('spp')->where('id_spp', $id)->get()->getRowArray();
    }
    public function getKelas($id)
    {
        return $this->db->table('kelas')->where('id_kelas', $id)->get()->getRowArray();
    }
    public function tambahdata($data)
    {
        return $this->db->table('siswa')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        return $this->db->table('siswa')->update($data, array('nisn' => $id));
    }
    public function hapusdata($id)
    {
        return $this->db->table('siswa')->delete(array('nisn' => $id));
    }
}
