<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{

    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = [
        'id_petugas',
        'username',
        'password',
        'nama_petugas',
        'level',
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->db->table('petugas')->where('id_petugas', $id)->get()->getRowArray();
    }
    public function tambahdata($data)
    {
        return $this->db->table('petugas')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('petugas')->update($data, array('id_petugas' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('petugas')->delete(array('id_petugas' => $id));
        return $query;
    }
}
