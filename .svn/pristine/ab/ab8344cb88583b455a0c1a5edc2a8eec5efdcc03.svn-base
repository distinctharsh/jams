<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first');
        }

        // CSRF Token regeneration for security
        if (session()->get('isLoggedIn')) {
            $this->regenerateCSRFToken();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

    private function regenerateCSRFToken()
    {
        if (function_exists('csrf_token')) {
            // Regenerate CSRF token on each request for security
            $csrfToken = csrf_hash();
            session()->set('csrf_token', $csrfToken);
        }
    }
}