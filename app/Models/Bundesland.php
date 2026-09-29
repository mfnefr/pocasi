<?php

namespace App\Models;

use CodeIgniter\Model;

class Bundesland extends Model
{
        protected $table            = 'bundesland';
        protected $primaryKey       = 'id';
        protected $useAutoIncrement = true;
        protected $returnType       = 'object';
        protected $useSoftDeletes   = false;
        protected $protectFields    = true;
        protected $allowedFields    = ['id', 'name', 'short_name', 'mapa', 'vlajka', 'stranka'];
    
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

        public function getAllBundesland(){
            return $this->orderBy('name', 'asc')->findAll();
        }

        public function getBundesland($id){
            return $this->find($id);
        }
        
        public function getVlajka($bundesland){
            return $this->select('vlajka')->where('id', $bundesland)->first();
        }
    }