<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Member;
use App\Models\Karyawan;
use PhpParser\Node\Expr\Print_;

class AkunKaryawan extends BaseController
{

    public function create()
    {
        $karyawanModel = new Karyawan();
        $karyawan = $karyawanModel->findAll();

        $data = [
            'title' => 'Create Karyawan',
            'karyawan' => $karyawan,
        ];

        return view('templates/he', $data)
            . view('pages/regis', $data)
            . view('templates/f');
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'nik' => 'required',
            'pin' => 'required',
            'nomorTelepon' => 'required',

        ])) {
            //return redirect()->to('/listkaryawan');
        }
        $karyawanModel = new Karyawan();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempatLahir' => $this->request->getPost('tempatLahir'),
            'tanggalLahir' => $this->request->getPost('tanggalLahir'),
            'jenisKelamin' => $this->request->getPost('jenisKelamin'),
            'nik' => $this->request->getPost('nik'),
            'pin' => $this->request->getPost('pin'),
            'nomorTelepon' => $this->request->getPost('nomorTelepon'),

        ];

        $karyawanModel->saveKaryawan($data);
        return redirect()->to('/listkaryawan');
    }

    public function delete($nik)
    {
        $karyawanModel = new Karyawan();
        $karyawanModel->delete($nik);

        return redirect()->to('/listkaryawan');
    }

    public function edit($nik)
    {
        $karyawanModel = new Karyawan();
        $karyawan = $karyawanModel->find($nik);
        $data = [
            'title' => 'Edit Karyawan'
        ];

        return view('templates/h', $data)
            . view('pages/formeditkaryawan', $karyawan)
            . view('templates/f');
    }

    public function update($nik)
    {
        if (!$this->validate([
            'nik' => 'required',
            'namaLengkap' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'pin' => 'required',
            'nomorTelepon' => 'required',
        ])) {
            //return redirect()->to('/listkaryawan');
        }
        $karyawanModel = new Karyawan();
        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'tempatLahir' => $this->request->getVar('tempatLahir'),
            'tanggalLahir' => $this->request->getVar('tanggalLahir'),
            'jenisKelamin' => $this->request->getVar('jenisKelamin'),
            'pin' => $this->request->getVar('pin'),
            'nomorTelepon' => $this->request->getVar('nomorTelepon'),

        ];

        $karyawanModel->update($nik, $data);
        return redirect()->to('/listkaryawan');
    }

    public function cetakkartu($nik){
        $memberModel = new Member();
        $member = $memberModel->find($nik);

        $data = [
            'title' => 'Edit Data Member',
            'member' => $member,
        ];
        return view('pages/cetak_kartu', $data);
    }
}
