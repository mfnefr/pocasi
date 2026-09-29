<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Adresni_misto;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Bundesland;
use App\Models\Data;
use App\Models\Okres;
use App\Models\Stanice;
use App\Models\Kraj;
use App\Models\Obec;

//php spark make:controller Main
class Main extends BaseController
{
    var $okres;
    var $data;
    var $kraj;
    var $obec;
    var $am;

    public function __construct()
    {
        //$this->am = new Adresni_misto();
        //$this->okres = new Okres();
        //$this->kraj = new Kraj();
        //$this->obec = new Obec();
        //$okresy = $this->kraj->join('okres', 'kraj.kod = okres.kraj', 'inner')->where('okres.kraj', '141')->findAll();
        //$this->data['okresy'] = $okresy;
        $this->bundesland = new Bundesland();
    }

    public function smazatData($id)
    {
        $monthYear = $this->request->getPost('month_year'); 
        
        if ($monthYear) {
            $parts = explode('-', $monthYear);
            if (count($parts) === 2) {
                $year = $parts[0];
                $month = $parts[1];

                $dataModel = new Data();
                
                $dataModel->where('Stations_ID', $id)
                          ->where('YEAR(date)', $year)
                          ->where('MONTH(date)', $month)
                          ->delete();

                return redirect()->back()->with('message', "Data z {$month}/{$year} byla úspěšně smazána.");
            }
        }

        return redirect()->back()->with('error', 'Nepodařilo se smazat data.');
    }
    public function bundesIndex(){
        $data['bundeslands'] = $this->bundesland->findAll();
        return view('bundesland', $data);
    }
    public function index($limit = 20)
    {   
        $limit = $this->request->getGet('limit') ?: 20;
        $limit = (int) $limit;
        if($limit <= 0){
            $limit = 20;
        }
        $dataAdresy['obce'] = $this->am->ziskejPocetAdres($limit);
        $dataStrankovana['pager'] = $this->am->pager;
        $dataLimit['limit'] = $limit;
        return view('main_stranka', ['okresy' => $this->data['okresy'], 'obce' => $dataAdresy['obce'], 'pager' => $dataStrankovana['pager'], 'limit' => $dataLimit['limit']]);
    }
    public function obce($kod, $limit = 20){
        $limit = $this->request->getGet('limit') ?: 20;
        $limit = (int) $limit;
        if($limit <= 0){
            $limit = 20;
        }
        $obceData['obce'] = $this->am->ziskejPocetAdresProOkres($kod, $limit);
        $dataStrankovana['pager'] = $this->am->pager;
        $data['okresKod'] = $kod;
        $dataLimit['limit'] = $limit;

        return view('obce', ['obce' => $obceData['obce'], 'okresy' => $this->data['okresy'], 'pager' => $dataStrankovana['pager'], 'kod' => $data['okresKod'], 'limit' => $dataLimit['limit']]);
    }

    public function stanice($bundesland){
        $bundeslandModel = new Bundesland();
        $staniceModel = new Stanice();
        $bundeslandZeme = $bundeslandModel->getBundesland($bundesland);
        $stanice = $staniceModel->getStaniceProBundesland($bundesland);
        return view('stanice', ['bundeslandZeme' => $bundeslandZeme, 'stanice' => $stanice]);
    }
    public function staniceDetaily($id){
        $staniceModel = new Stanice();
        $dataModel = new Data();

        $stanice = $staniceModel->getStanici($id);

        if (!$stanice) {
            return view('data/index', ['stanice' => null, 'data' => []]);
        }

        $data = $dataModel->getDataProStanici($id);

        $records = $dataModel->where('Stations_ID', $id)->orderBy('date', 'desc')->paginate(25);
        #$data['records'] = $records;

        $data['pager'] = $dataModel->pager;

        return view('data/index', ['stanice' => $stanice, 'data' => $data, 'records' => $records,  'pager' => $data['pager']]);
    }
    public function strankovaneData($id, $page = 1)
    {
        $dataModel = new Data();
        $limit = 25;
        $offset = ($page - 1) * $limit;
        $data = $dataModel->getDataProStanici($id, $limit, $offset);
        return view('data/strankovane', ['data' => $data, 'S_ID' => $S_ID, 'page' => $page]);
    }
    public function spolkoveZeme($id){
        $bundeslandModel = new Bundesland();
        $bundesland = $bundeslandModel->getBundesland($id);
        return view('spolkoveZeme', ['bundesland' => $bundesland]);
    }
    public function strankovaneData2(){
        $dataModel = new Data();
        $records = $dataModel->where('Stations_ID', $Stations_ID)->orderBy('date', 'desc')->paginate(10);
        $data['records'] = $records;
        $data['pager'] = $dataModel->pager;
        return view('data/index', $data);
    }
}