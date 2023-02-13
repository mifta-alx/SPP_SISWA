<?php namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = [
        'id_petugas',
        'username',
        'password',
        'nama_petugas',
        'level',
        'foto',
        'jabatan',
        'tgl_lahir',
        'tampat_tinggal',
        'email',
        'no_hp',
    ];
    public function cek_login($username, $password)
    {
        return $this->db->table('petugas')
        ->where(array('username' => $username,'password' => $password))
        ->get()->getRowArray();
    }
    public function cek_login_siswa($username, $password)
    {
        return $this->db->table('siswa')
        ->where(array('nama' => $username,'nisn' => $password))
        ->get()->getRowArray();
    }
    public function saveData($data)
    {
        return $this->db->table('petugas')->insert($data);
    }
    public function data($id)
    {
        return $this->db->table('petugas')->where('id_petugas', $id)->get()->getResult();
    }
}
?>