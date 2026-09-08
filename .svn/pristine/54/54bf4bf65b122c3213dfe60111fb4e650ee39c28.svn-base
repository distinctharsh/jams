<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'state';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'state_name',
        'status'
    ];

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
     * GET STATE BY ID
     * =========================================================
     */
    public function getStateById(int $stateId)
    {
        return $this->db
            ->table('state')
            ->select('id, state_name')
            ->where('id', $stateId)
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }

    /**
     * =========================================================
     * GET STATE NAME BY ID
     * =========================================================
     */
    public function getStateNameById(int $stateId): ?string
    {
        $state = $this->getStateById($stateId);

        return $state['state_name'] ?? null;
    }

    /**
     * =========================================================
     * GET ACTIVE CITIES BY STATE ID
     * =========================================================
     */
    public function getCitiesByState(int $stateId)
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

    /**
     * =========================================================
     * GET CITY BY ID
     * =========================================================
     */
    public function getCityById(int $cityId)
    {
        return $this->db
            ->table('city')
            ->select('id, state_id, city_name')
            ->where('id', $cityId)
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }

    /**
     * =========================================================
     * GET CITY NAME BY ID
     * =========================================================
     */
    public function getCityNameById(int $cityId): ?string
    {
        $city = $this->getCityById($cityId);

        return $city['city_name'] ?? null;
    }
}

