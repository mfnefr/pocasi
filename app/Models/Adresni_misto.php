<?php

namespace App\Models;

use CodeIgniter\Model;

class Adresni_misto extends Model
{
        protected $table            = 'adresni_misto';
        protected $primaryKey       = 'kod';
        protected $useAutoIncrement = true;
        protected $returnType       = 'object';
        protected $useSoftDeletes   = false;
        protected $protectFields    = true;
        protected $allowedFields    = [];
    
        protected bool $allowEmptyInserts = false;
        protected bool $updateOnlyChanged = true;
    
        protected array $casts = [];
        protected array $castHandlers = [];
    
        // Dates
        protected $useTimestamps = false;
        protected $dateFormat    = 'datetime';
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';
    
        // Validation
        protected $validationRules      = [];
        protected $validationMessages   = [];
        protected $skipValidation       = false;
        protected $cleanValidationRules = true;
    
        // Callbacks
        protected $allowCallbacks = true;
        protected $beforeInsert   = [];
        protected $afterInsert    = [];
        protected $beforeUpdate   = [];
        protected $afterUpdate    = [];
        protected $beforeFind     = [];
        protected $afterFind      = [];
        protected $beforeDelete   = [];
        protected $afterDelete    = [];

        public function ziskejPocetAdres($limit = 20){
                return $this->table('adresni_misto')
                ->select('obec.nazev AS obec_nazev, COUNT(adresni_misto.kod) AS pocet_adresnich_mist')
                ->join('ulice', 'adresni_misto.ulice = ulice.kod') 
                ->join('cast_obce', 'ulice.cast_obce = cast_obce.kod') 
                ->join('obec', 'cast_obce.obec = obec.kod') 
                ->join('okres', 'obec.okres = okres.kod') 
                ->join('kraj', 'okres.kraj = kraj.kod') 
                ->where('kraj.nazev', 'Zlínský kraj') 
                ->groupBy('obec.kod')
                ->orderBy('pocet_adresnich_mist', 'desc') 
                ->paginate($limit);
        } 
        public function ziskejPocetAdresProOkres($okresKod, $limit = 20){
            return $this->table('adresni_misto')
            ->select('obec.nazev AS obec_nazev, COUNT(adresni_misto.kod) AS pocet_adresnich_mist')
            ->join('ulice', 'adresni_misto.ulice = ulice.kod') 
            ->join('cast_obce', 'ulice.cast_obce = cast_obce.kod') 
            ->join('obec', 'cast_obce.obec = obec.kod') 
            ->join('okres', 'obec.okres = okres.kod') 
            ->join('kraj', 'okres.kraj = kraj.kod') 
            ->where('kraj.nazev', 'Zlínský kraj') 
            ->where('okres.kod', $okresKod) 
            ->groupBy('obec.kod')
            ->orderBy('pocet_adresnich_mist', 'desc') 
            ->paginate($limit);
        }
}