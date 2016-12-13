<?php
namespace Cendekia\LaravelAdminBoilerplate\Controllers;
 
use App\Http\Controllers\Controller;
 
class AdminBoilerplateController extends Controller
{
    public function index()
    {
        return view('adminboiler::index');
    }
 
}