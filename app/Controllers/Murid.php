<?php

namespace App\Controllers;

class Murid extends BaseController
{
    protected $ujianModel;

    public function __construct()
    {
        $this->ujianModel = new \App\Models\UjianModel();
    }

    public function index()
    {

        return view('murid/main');
    }

    public function exams()
    {
        $ujian = $this->ujianModel->findAll();

        $data = [
            'ujian' => $ujian,
        ];

        return view('murid/exams', $data);
    }

    //--------------------------------------------------------------------

}
