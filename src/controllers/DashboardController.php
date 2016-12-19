<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
 
class DashboardController extends AdminController
{
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        return view('admin-view::index');
    }
 
}