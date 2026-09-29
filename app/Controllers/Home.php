<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Bundesland;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pokus');
    }
}
