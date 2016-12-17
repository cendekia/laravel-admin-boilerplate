<?php
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
 
class AdminBoilerplateController extends Controller
{
    public function index()
    {
        return view('admin-view::index');
    }
 
}