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
        $builder = $this->db->table('application a')
            ->select('
                a.id,
                a.app_no,
                MAX(o.org_name) as organisation,
                MAX(
                    CASE 
                        WHEN latest_history.status BETWEEN 4 AND 9 THEN "Pending with cabsec" 
                        ELSE act.name 
                    END
                ) as status_name,
                a.created_at,
                a.centre_list_ready,
                GROUP_CONCAT(DISTINCT d.exam_name SEPARATOR "||") as exam_names,
                GROUP_CONCAT(d.exam_date ORDER BY d.exam_date ASC SEPARATOR "||") as exam_dates
            ')
            ->join('(
                SELECT ah1.* 
                FROM application_history ah1
                INNER JOIN (
                    SELECT app_id, MAX(id) as max_id 
                    FROM application_history 
                    GROUP BY app_id
                ) ah2 ON ah1.id = ah2.max_id
            ) latest_history', 'latest_history.app_id = a.id', 'left')
            ->join('mas_application_action act', 'act.id = latest_history.status', 'left')
            ->join('user u', 'u.id = a.user_id', 'left')
            ->join('mas_organization o', 'o.id = u.organization_id', 'left')
            ->join('application_date_mapping d', 'd.app_id = a.id', 'left')
            ->where('a.isactive', 1)
            ->groupBy('a.id')
            ->orderBy('a.id', 'DESC');

        if ($userId !== null) {
            $builder->where('a.user_id', $userId);
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