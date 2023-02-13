<?php

namespace App\Models;

use CodeIgniter\Model;
class RiwayatModel extends Model
{

    protected $table = 'riwayat';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = [
        'id_pembayaran',
        'id_petugas',
        'nama_petugas',
        'nisn',
        'nama',
        'nama_kelas',
        'tgl_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'id_spp',
        'jumlah_bayar',
        'jumlah_dibayar',
        'sisa',
        'status'
    ];
    public function getUsers()
    {
        return $this->findAll();
    }
    public function getData($id_petugas = [], $nisn = [], $id_spp = [], $nominal)
    {
        if ($id_petugas) {
            $this->builder()->whereIn('id_petugas', $id_petugas);
        }
        if ($nisn) {
            $this->builder()->whereIn('nisn', $nisn);
        }
        if ($id_spp) {
            $this->builder()->whereIn('id_spp', $id_spp);
        }
        if ($nominal) {
            $this->builder()->whereIn('nominal', $nominal);
        }
        return $this->findAll();
    }
    public function id_petugas()
    {
        return $this->db->table('pembayaran')->distinct()->select('id_pembayaran')->get()->getResultArray();
    }
    public function nisn()
    {
        return $this->db->table('pembayaran')->distinct()->select('nisn')->get()->getResultArray();
    }
    public function id_spp()
    {
        return $this->db->table('pembayaran')->distinct()->select('id_spp')->get()->getResultArray();
    }
    public function nominal()
    {
        return $this->db->table('pembayaran')->distinct()->select('jumlah_bayar')->get()->getResultArray();
    }
    public function hitungriwayat()
    {
        return $this->db->table('riwayat')->countAllResults();
    }
    public function riwayatsiswa($id)
    {
        return $this->db->table('riwayat')->where('nisn', $id)->get()->getResult();
    }
    public function getById($id)
    {
        return $this->db->table('riwayat')->where('id_pembayaran', $id)->get()->getRowArray();
    }
    public function bayar($id)
    {
        return $this->db->table('riwayat')->select('jumlah_dibayar')->where('id_pembayaran', $id)->get()->getResult();
    }
    public function sisa($id)
    {
        return $this->db->table('riwayat')->select('sisa')->where('id_pembayaran', $id)->get()->getResult();
    }
    public function getsisa($id)
    {
        return $this->db->table('riwayat')->select('sisa')->where('id_pembayaran', $id)->get()->getResult();
    }
    public function hapuspay($id)
    {
        return $this->db->table('pembayaran')->delete(array('id_pembayaran' => $id));
    }
    public function simpanhis($data)
    {
        return $this->db->table('riwayat')->insert($data);
    }
    public function ubahhis($id, $data)
    {
        return $this->db->table('riwayat')->update($data, array('id_pembayaran' => $id));
    }
    public function getData2($id)
    {
        return $this->db->table('riwayat')->where('id',$id)->get()->getRowArray();
    }
    //
    
}
