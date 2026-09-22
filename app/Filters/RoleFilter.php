<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $params = null)
    {
        if (empty($params)) {
            return;
        }

        $allowedRoles = array_map('intval', array_filter($params, 'is_numeric'));
        if (empty($allowedRoles)) {
            return;
        }

        $sessionRoleIds = session()->get('role_ids') ?? '';
        $userRoles = array_map('intval', array_filter(explode(',', (string)$sessionRoleIds)));

        if (!empty(array_intersect($allowedRoles, $userRoles))) {
            return;
        }

        if ($request->isAJAX()) {
            return response()
                ->setStatusCode(403)
                ->setJSON([
                    'status'  => false,
                    'error'   => 403,
                    'message' => 'Forbidden: You do not have permission to perform this action.'
                ]);
        }

        if (session()->get('isLoggedIn') || session()->has('user_id') || !empty($userRoles)) {
            return redirect()->to(base_url('dashboard'))->with('error', 'You do not have permission to access that page.');
        }

        return redirect()->to(base_url('/'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $params = null)
    {
    }
}