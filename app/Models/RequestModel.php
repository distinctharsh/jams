<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'application';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'app_no',
        'user_id',
        'adequate_arrangement_check',
        'jammer_accounted',
        'non_intereference',
        'created_at',
        'current_status',
        'isactive',
        'is_single_exam',
        'is_single_date',
        'centre_list_ready',
        'contact_person',
        'email',
        'phone',
        'organisation',
        'organisation_type',
        'undertaking'
    ];

    /**
     * Get All Applications
     */
    public function getAllRequests(?int $userId = null)
    {
        $builder = $this->db->table('vw_application_latest_status v')
            ->select('
                v.application_id as id,
                v.app_no,
                v.organisation,
                act.name as status_name,
                v.currently_with,
                v.created_at,
                v.centre_list_ready,
                GROUP_CONCAT(DISTINCT d.exam_name SEPARATOR "||") as exam_names,
                GROUP_CONCAT(d.exam_date ORDER BY d.exam_date ASC SEPARATOR "||") as exam_dates
            ')
            ->join('mas_application_action act', 'act.id = v.current_status', 'left')
            ->join('application_date_mapping d', 'd.app_id = v.application_id', 'left')
            ->groupBy('
                v.application_id, 
                v.app_no, 
                v.organisation, 
                act.name, 
                v.currently_with, 
                v.created_at, 
                v.centre_list_ready
            ')
            ->orderBy('v.created_at', 'DESC');

        if ($userId !== null) {
            $builder->where('v.currently_with', $userId);
        }

        return $builder->get()->getResultArray();
    }

    /**
     * Get Application By ID
     */
    public function getRequestById($id)
    {
        $application = $this->find($id);

        if ($application) {
            $db = \Config\Database::connect();
            
            $application['dates'] = $db->table('application_date_mapping')
                ->where('app_id', $id)
                ->get()
                ->getResultArray();

            $application['centres'] = $db->table('application_centre_mapping')
                ->where('app_id', $id)
                ->get()
                ->getResultArray();
        }

        return $application;
    }
}