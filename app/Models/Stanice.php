<?php
namespace App\Models;

use CodeIgniter\Model;

class Stanice extends Model{
        protected $table            = 'station';
        protected $primaryKey       = 'S_ID';
        protected $useAutoIncrement = true;
        protected $returnType       = 'object';
        protected $useSoftDeletes   = false;
        protected $protectFields    = true;
        protected $allowedFields    = ['S_ID', 'place', 'geo_latitude', 'geo_longtitude', 'height', 'operator', 'bundesland'];
    
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

        public function getStaniceProBundesland($bundesland){
            return $this->where('bundesland', $bundesland)->findAll();
        }
        public function getStanici($id){
            if ($id == 1684) {
                return view('data/index', ['stanice' => null, 'data' => null]);
            }else{
                return $this->find($id);
            }
        }
}