<?php

namespace App\Controllers;

class Landing extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'EXAMO'
        ];

        return view('landing/index', $data);
    }

    public function login()
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->findAll();

        $data = [
            'judul' => 'Login',
            'users' => $user
        ];

        return view('landing/login', $data);
    }

    public function signup($status = 'murid')
    {
        $data = [
            'judul' => 'Sign Up'
        ];

        if ($status == 'murid') {
            return view('landing/signup', $data);
        } else if ($status == 'guru') {
            return view('landing/signup_guru', $data);
        }
    }

    public function logout()
    {
        return view('landing/logout');
    }

    public function tambahUser($status = 'murid')
    {
        $this->userModel->save(
            [
                'firstName' => $this->request->getVar('firstname'),
                'lastName' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                'institute' => $this->request->getVar('institute'),
                'mobile' => $this->request->getVar('mobilenumber'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status' => $status
            ]
        );

        return redirect()->to('/landing/login');
    }

    //--------------------------------------------------------------------

}
