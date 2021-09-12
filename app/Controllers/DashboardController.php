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
        ];
        return view('Views\dashboard', $data);
    }
}
