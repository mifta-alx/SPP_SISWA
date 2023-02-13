<?php

namespace App\Models;

use CodeIgniter\Model;

class PayModel extends Model
{

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = [
        'id_pembayaran',
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'id_spp',
        'jumlah_bayar',
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
        return $this->db->table('petugas')->distinct()->select('id_petugas')->get()->getResultArray();
    }
    public function nisn()
    {
        return $this->db->table('siswa')->distinct()->select('nisn')->get()->getResultArray();
    }
    public function id_spp()
    {
        return $this->db->table('spp')->distinct()->select('id_spp')->get()->getResultArray();
    }
    public function nominal()
    {
        return $this->db->table('spp')->distinct()->select('nominal')->get()->getResultArray();
    }
    public function bayar($id)
    {
        return $this->db->table('riwayat')->select('jumlah_bayar')->where('id_pembayaran', $id)->get()->getResultArray();
    }
    public function getById($id)
    {
        return $this->db->table('spp')->where('id_spp', $id)->get()->getRowArray();
    }
    public function getPetugas($id)
    {
        return $this->db->table('petugas')->where('id_petugas', $id)->get()->getRowArray();
    }
    public function getsisa($id)
    {
        return $this->db->table('pembayaran')->select('sisa')->where('id_pembayaran', $id)->get()->getResult();
    }
    public function addsisapay($data2)
    {
        return $this->db->table('pembayaran')->insert($data2);
    }
    public function ubahsisapay($id, $data2)
    {
        return $this->db->table('pembayaran')->update($data2, array('id_pembayaran' => $id));
    }
    public function ByIdSiswa($id)
    {
        return $this->db->table('siswa')->where('nisn', $id)->get()->getRowArray();
    }
    public function getdatajoin($id)
    {
         $query = $this->db->table('siswa')
        ->join('spp', 'spp.id_spp=siswa.id_spp')
        ->where('nisn',$id)
        ->get()->getResultArray();
        return $query;
    }
    //
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
    //
    public function getPay()
    {
        $builder = $this->db->table('pembayaran');
        return $builder->get();
    }
    public function tambahidsppsiswa($dataidspp, $id)
    {
        return $this->db->table('siswa')->where('nisn', $id)->insert($dataidspp);
    }
    public function tambahdata($data)
    {
        return $this->db->table('pembayaran')->insert($data);
    }
    public function ubahdata($id, $data)
    {
        $query = $this->db->table('pembayaran')->update($data, array('id_pembayaran' => $id));
        return $query;
    }
    public function hapusdata($id)
    {
        $query = $this->db->table('pembayaran')->delete(array('id_pembayaran' => $id));
        return $query;
    }
}
