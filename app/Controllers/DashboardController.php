<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;

/**
 * Class DashboardController.
 */
class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => [[
                'title' => 'Dashboard',
                'route' => '/',
                'disabled' => true
            ]]
        ];

        // $session = \Config\Services::session();
        // in_groups('admin');
        return view('Views\dashboard', $data);
    }
}
