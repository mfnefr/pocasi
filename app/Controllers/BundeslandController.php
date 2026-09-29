<?php

namespace App\Controllers; //virtuální složka pro třídy, používá se pro rozlišení stejných názvů u jiných rodičovských tříd

use App\Models\Bundesland;

class BundeslandController extends BaseController
{
    public function index()
    {   
        $bundesland = new Bundesland();
        $data['bundesland'] = $this->$bundesland->name;
        return view('pokus', $data);
    }
}