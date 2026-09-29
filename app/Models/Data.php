<?php
namespace App\Models;

use CodeIgniter\Model;

class Data extends Model{
        protected $table            = 'data';
        protected $primaryKey       = 'id';
        protected $useAutoIncrement = true;
        protected $returnType       = 'object';
        protected $useSoftDeletes   = true;
        protected $protectFields    = true;
        protected $allowedFields    = ['id', 'Stations_ID', 'date', 'quality', 'min_5cm', 'min_2m', 'mid_2m', 'max_2m', 'humidity', 'mid_wind', 'max_wind', 'sun_length', 'mid_cloud', 'precipitation', 'mid_air_pressure'];
    
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

        public $pager;

        public function __construct(){
            parent::__construct();
            $this->pager = \Config\Services::pager();
        }

        public function getDataProStanici($Stations_ID, $limit = 25, $offset = 0){
            return $this->where('Stations_ID', $Stations_ID)->orderBy('date', 'desc')->findAll($limit, $offset);
        }
        #public function getStrankovaneData($Stations_ID, $strankovani){
        #   return $this->where('Stations_ID', $Stations_ID)->orderBy('date', 'desc')->paginate($strankovani);
        #}
}