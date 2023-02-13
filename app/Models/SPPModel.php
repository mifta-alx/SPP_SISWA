<?php

namespace App\Models;

use CodeIgniter\Model;

class SPPModel extends Model
{

    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    protected $allowedFields = [
        'id_spp',
        'tahun',
        'nominal',
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->db->table('spp')->where('id_spp', $id)->get()->getRowArray();
    }
    public function tambahdata($data)
    {
        return $this->db->table('spp')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('spp')->update($data, array('id_spp' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('spp')->delete(array('id_spp' => $id));
        return $query;
    }
}
