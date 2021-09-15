<?php

namespace App\Controllers;

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
        return view('Views\dashboard', $data);
    }
}
