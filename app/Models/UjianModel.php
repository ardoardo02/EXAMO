<?php

namespace App\Models;

use CodeIgniter\Model;

class UjianModel extends Model
{
    protected $table = 'ujian';
    protected $useTimestamps = false;
    protected $allowedFields = ['userid', 'mapel', 'materi', 'tingkat', 'tanggal', 'sTime', 'eTime', 'randomize'];
}
