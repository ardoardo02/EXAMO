<?php

namespace App\Controllers;

class Pengajar extends BaseController
{
    protected $pengajarModel;
    protected $makeModel;

    public function __construct()
    {
        $this->pengajarModel = new \App\Models\UserModel();
        $this->makeModel = new \App\Models\UjianModel();
    }

    public function index($uid)
    {
        $user = $this->pengajarModel->find($uid);
        $resultUjian = $this->makeModel->where('userid', $uid)->orderBy('kode_soal', 'DESC')->findAll();

        $data = [
            'judul' => 'Home',
            'user' => $user,
            'resultUjian' => $resultUjian
        ];

        return view('pengajar/index', $data);
    }

    public function profile($uid)
    {
        $user = $this->pengajarModel->find($uid);

        $data = [
            'judul' => 'Profile',
            'user' => $user
        ];

        return view('pengajar/profile', $data);
    }

    public function make($uid)
    {
        $user = $this->pengajarModel->find($uid);
        $resultUjian = $this->makeModel->where('userid', $uid)->orderBy('kode_soal', 'DESC')->findAll();

        $data = [
            'judul' => 'Make Exam',
            'user' => $user,
            'resultUjian' => $resultUjian
        ];

        return view('pengajar/make', $data);
    }

    public function make_detail($uid, $kid)
    {
        $user = $this->pengajarModel->find($uid);
        $ujian = $this->makeModel->where('kode_soal', $kid)->first();
        $resultUjian = $this->makeModel->where('userid', $uid)->orderBy('kode_soal', 'DESC')->findAll();

        $data = [
            'judul' => 'Edit Exam',
            'user' => $user,
            'ujian' => $ujian,
            'resultUjian' => $resultUjian
        ];

        return view('pengajar/makeDetail', $data);
    }

    public function newExam($uid)
    {
        $this->makeModel->save(
            [
                'userid' => $uid
            ]
        );

        $resultUjian = $this->makeModel->where('userid', $uid)->orderBy('kode_soal', 'DESC')->first();

        return redirect()->to('/pengajar/make_detail/' . $uid . "/" . $resultUjian['kode_soal']);
    }

    public function save()
    {
        $randomize = $this->request->getVar('randomize');
        if ($randomize == 'on') $randomize = 1;

        $data = [
            'kode_soal' => $this->request->getVar('kode'),
            'userid' => $this->request->getVar('userid'),
            'mapel' => $this->request->getVar('mapel'),
            'materi' => $this->request->getVar('materi'),
            'tingkat' => $this->request->getVar('tingkatan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'sTime' => $this->request->getVar('sTime'),
            'eTime' => $this->request->getVar('eTime'),
            'randomize' => $randomize
        ];

        $this->makeModel->replace($data);

        return redirect()->to('/pengajar/make_detail/' . $this->request->getVar('userid') . "/" . $this->request->getVar('kode'));
    }

    public function delete()
    {
        $id = $this->request->getVar('userid');
        $kid = $this->request->getVar('kode');

        $this->makeModel->where('kode_soal', $kid)->delete();

        return redirect()->to('/pengajar/make/' . $id);
    }

    public function password()
    {
        $user = $this->pengajarModel->find($this->request->getVar('userid'));

        $data = [
            'judul' => 'Ganti Kata Sandi',
            'user' => $user
        ];

        return view('pengajar/password', $data);
    }

    public function gantiPass()
    {
        $passLama = $this->request->getVar('pass1');
        $passBaru = $this->request->getVar('pass2');
        $id = $this->request->getVar('userid');

        $user = $this->pengajarModel->find($id);

        if (password_verify($passLama, $user['password'])) {
            $data = [
                'id' => $id,
                'firstName' => $user['firstName'],
                'lastName' => $user['lastName'],
                'email' => $user['email'],
                'institute' => $user['institute'],
                'mobile' => $user['mobile'],
                'password' => password_hash($passBaru, PASSWORD_DEFAULT),
                'status' => $user['status']
            ];

            $this->pengajarModel->replace($data);
        }

        return redirect()->to('/pengajar/profile/' . $id);
    }

    //--------------------------------------------------------------------

}
