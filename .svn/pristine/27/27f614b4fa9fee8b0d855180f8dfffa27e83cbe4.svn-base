<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LocationModel;

class LocationController extends BaseController
{
    protected $locationModel;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
    }

    /**
     * =========================================================
     * GET STATES
     * =========================================================
     */
    public function getStates()
    {
        if (!$this->request->isAJAX()) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'status'    => false,
                    'message'   => 'Invalid request',
                    'data'      => [],
                    'csrf_hash' => csrf_hash()
                ]);
        }

        try {

            $states = $this->locationModel->getStates();

            return $this->response->setJSON([
                'status'    => true,
                'message'   => 'States loaded successfully',
                'data'      => $states,
                'csrf_hash' => csrf_hash()
            ]);

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Location getStates Error: ' . $e->getMessage()
            );

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status'    => false,
                    'message'   => 'Unable to load states',
                    'data'      => [],
                    'csrf_hash' => csrf_hash()
                ]);
        }
    }

    /**
     * =========================================================
     * GET CITIES
     * =========================================================
     */
    public function getCities()
    {
        if (!$this->request->isAJAX()) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'status'    => false,
                    'message'   => 'Invalid request',
                    'data'      => [],
                    'csrf_hash' => csrf_hash()
                ]);
        }

        $stateId = $this->request->getPost('state_id');

        if (empty($stateId) || !is_numeric($stateId)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status'    => false,
                    'message'   => 'State ID is required',
                    'data'      => [],
                    'csrf_hash' => csrf_hash()
                ]);
        }

        try {

            $cities = $this->locationModel
                ->getCitiesByState((int) $stateId);

            return $this->response->setJSON([
                'status'    => true,
                'message'   => 'Cities loaded successfully',
                'data'      => $cities,
                'csrf_hash' => csrf_hash()
            ]);

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Location getCities Error: ' . $e->getMessage()
            );

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status'    => false,
                    'message'   => 'Unable to load cities',
                    'data'      => [],
                    'csrf_hash' => csrf_hash()
                ]);
        }
    }
}

