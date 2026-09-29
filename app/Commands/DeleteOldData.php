<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\Data;

class DeleteOldData extends BaseCommand
{
    protected $group       = 'Data';
    protected $name        = 'data:delete-old';
    protected $description = 'Smaže (pomocí soft delete) záznamy starší než 11 let.';

    public function run(array $params)
    {
        $dataModel = new Data();
        $hranicniDatum = date('Y-m-d', strtotime('-11 years'));
        
        $dataModel->where('date <', $hranicniDatum)->delete();
    }
}
