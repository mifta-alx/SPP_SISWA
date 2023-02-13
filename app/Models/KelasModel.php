<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = [
        'id_kelas',
        'nama_kelas',
        'kompetensi_keahlian',
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function kompetensi_keahlian()
    {
        return $this->db->table('kelas')->distinct()->select('kompetensi_keahlian')->get()->getResultArray();
    }
    public function getById($id)
    {
        return $this->db->table('kelas')->where('id_kelas', $id)->get()->getRowArray();
    }
    public function tambahdata($data)
    {
        return $this->db->table('kelas')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('kelas')->update($data, array('id_kelas' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('kelas')->delete(array('id_kelas' => $id));
        return $query;
    }
}
