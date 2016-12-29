<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class MemberController extends AdminController
{
    public function __construct(User $model)
    {
        parent::__construct();

        $this->model = $model;  
        $this->url = admin_url('members');
        $this->columns = [
            'id', 'name', 'email'
        ];

        $this->actionAllowed = ['create', 'edit', 'delete'];

        view()->share([
            'actionAllowed' => $this->actionAllowed
        ]);        
    }

    public function getData()
    {
        $admin = $this->admin;
        $query = $this->model
            ->where('id', '<>', $admin->id)
            ->select($this->columns);

        return \Datatables::of($query)
            ->addColumn('action', function ($query) use ($admin) {
                $actionUrl = $this->url.'/'.$query->id;
                $editBtn = admin_edit_button($actionUrl.'/edit', $admin);
                $deleteBtn = admin_delete_button($actionUrl, $admin);
                
                return $editBtn.$deleteBtn;
            })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return parent::getTable($this->columns, $this->url, 'table', 'Members');
    }
}
