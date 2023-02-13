<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    // protected $table = 'petugas';
    protected $table = 'riwayat';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = [
        'id_pembayaran',
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'id_spp',
        'jumlah_bayar',
        'jumlah_dibayar',
        'sisa',
        'status'
    ];
    public function getData($status = [])
    {
        if ($status) {
            $this->builder()->whereIn('status', $status);
        }
        return $this->findAll();
    }
    public function hitungpetugas()
    {
        return $this->db->table('petugas')->where('level', 'petugas')->countAllResults();
    }
    public function hitungadmin()
    {
        return $this->db->table('petugas')->where('level', 'admin')->countAllResults();
    }
    public function hitungfullpetugas()
    {
        return $this->db->table('petugas')->countAllResults();
    }
    public function hitungsiswa()
    {
        return $this->db->table('siswa')->countAllResults();
    }
    public function hitungkelas()
    {
        return $this->db->table('kelas')->countAllResults();
    }
    public function hitungspp()
    {
        return $this->db->table('spp')->countAllResults();
    }
    public function hitungpay()
    {
        return $this->db->table('pembayaran')->countAllResults();
    }
    public function hitungriwayat()
    {
        return $this->db->table('riwayat')->countAllResults();
    }
    public function hitunglunas()
    {
        return $this->db->table('riwayat')->where('status', 'Lunas')->countAllResults();
    }
    public function hitungblmlunas()
    {
        return $this->db->table('riwayat')->where('status', 'Belum Lunas')->countAllResults();
    }
    public function siswa()
    {
        return $this->db->table('siswa')->get()->getResultArray();
    }
    public function kelas()
    {
        return $this->db->table('kelas')->get()->getResultArray();
    }
    public function petugas()
    {
        return $this->db->table('petugas')->get()->getResultArray();
    }
    public function spp()
    {
        return $this->db->table('spp')->get()->getResultArray();
    }
    public function pembayaran()
    {
        return $this->db->table('pembayaran')->get()->getResultArray();
    }
    public function riwayat()
    {
        return $this->db->table('riwayat')->get()->getResultArray();
    }
    public function getCountStatus()
    {
        $this->builder()->select('status, COUNT(status) as total')->where('status !=', '-');
        $this->builder()->groupBy('status')->orderBy('total', 'desc');
        $query = $this->builder()->get()->getResultArray();
        foreach ($query as $i => $row) {
            $searches = array("\r", "\n", "\r\n");
            // checking data 
            if ($this->array_in_string($row['status'], $searches)) {
                // Replace the line breaks with a space
                $newString = str_replace($searches, "", $row['status']);
                foreach ($query as $j => $data) {
                    if ($data['status'] == $newString) {
                        // add count
                        $query[$j]['total'] += $row['total'];
                        unset($query[$i]);
                    }
                }
            }
        }
        return $query;
    }
    function array_in_string($str, array $arr)
    {
        foreach ($arr as $arr_value) { //start looping the array
            if (stripos($str, $arr_value) !== false) return true; //if $arr_value is found in $str return true
        }
        return false; //else return false
    }
}
