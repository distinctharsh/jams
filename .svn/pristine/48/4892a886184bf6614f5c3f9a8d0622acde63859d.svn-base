<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'state';

    protected $primaryKey = 'id';

    protected $returnType = 'array';


    /**
     * =========================================================
     * GET ACTIVE STATES
     * =========================================================
     */
    public function getStates()
    {
        return $this->db
            ->table('state')
            ->select('id, state_name')
            ->where('status', 1)
            ->orderBy('state_name', 'ASC')
            ->get()
            ->getResultArray();
    }


    /**
     * =========================================================
     * GET ACTIVE CITIES BY STATE ID
     * =========================================================
     */
    public function getCitiesByState($stateId)
    {
        return $this->db
            ->table('city')
            ->select('id, state_id, city_name')
            ->where('state_id', $stateId)
            ->where('status', 1)
            ->orderBy('city_name', 'ASC')
            ->get()
            ->getResultArray();
    }
}