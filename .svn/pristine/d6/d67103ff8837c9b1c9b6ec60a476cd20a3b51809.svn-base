<?php

if (! function_exists('getMasterValue')) {
    function getMasterValue(
        string $table,
        $id,
        string $column = 'name',
        string $idColumn = 'id'
    ): string {
        if (empty($table) || empty($id)) {
            return '';
        }

        $db = \Config\Database::connect();

        $result = $db->table($table)
            ->select($column)
            ->where($idColumn, $id)
            ->get()
            ->getRowArray();

        return $result[$column] ?? '';
    }
}

if (!function_exists('get_default_password')) {
    function get_default_password(): string
    {
        return 'jams@2026';
    }
}

if (!function_exists('get_default_password_hash')) {
    function get_default_password_hash(): string
    {
        return password_hash(get_default_password(), PASSWORD_DEFAULT);
    }
}


if (!function_exists('create_audit_trail')) {
    function create_audit_trail(
        $userId = null,
        $loginName = null,
        $action = 'OTHER',
        $description = null
    ) {
        try {
            $db = \Config\Database::connect();
            $request = service('request');
            $ipAddress = $request->getIPAddress();
            $userAgent = $request->getUserAgent()->getAgentString();
            $data = [
                'user_id'            => $userId,
                'login_name'         => $loginName,
                'action'             => strtoupper($action),
                'action_description' => $description,
                'ip_address'         => $ipAddress,
                'user_agent'         => $userAgent,
                'created_at'         => date('Y-m-d H:i:s')
            ];
            if (strtoupper($action) === 'LOGIN') {
                $data['login_time'] = date('Y-m-d H:i:s');
            }
            if (strtoupper($action) === 'LOGOUT') {
                $data['logout_time'] = date('Y-m-d H:i:s');
            }
            $db->table('audit_trail')->insert($data);
            return $db->insertID();
        } catch (\Throwable $e) {
            log_message('error', 'Audit Trail Error: ' . $e->getMessage());
            return false;
        }
    }
 
 /*CALL-> create_audit_trail($user['id'], $user['email'], 'LOGIN', 'User logged in successfully');*/
}


if (!function_exists('create_audit_action')) {
    function create_audit_action(
        $userId = null,
        $loginName = null,
        $module = null,
        $action = 'OTHER',
        $recordId = null,
        $description = null
    ) {
        try {
            $db = \Config\Database::connect();
            $request = service('request');
            $data = [
                'user_id'     => $userId,
                'login_name'  => $loginName,
                'module'      => $module,
                'action'      => strtoupper($action),
                'record_id'   => $recordId,
                'description' => $description,
                'ip_address'  => $request->getIPAddress(),
                'user_agent'  => $request->getUserAgent()->getAgentString(),
                'created_at'  => date('Y-m-d H:i:s')
            ];

            $db->table('audit_action')->insert($data);

            return $db->insertID();

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Audit Action Error: ' . $e->getMessage()
            );

            return false;
        }
    }
    /*
    CALL:
    create_audit_action(null, $email, 'REGISTRATION', 'PENDING', $registrationId, 'Registration successful. Please upload your Authorization Letter.');
    */
}