<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
   		$this->middleware(function ($request, $next) {
            $this->navigation = (\Request::segment(2)) ?:null;
	    	$this->subNavigation = (\Request::segment(3)) ?:null;
	        $this->page = ($this->subNavigation) ?:$this->navigation;
            $this->admin = \Auth::user();
            
            if ($this->admin && session()->get('admin.role') == null) {
                \Session::put('admin', [
                    'role' => $this->admin->userRole->role
                ]);
            }

            view()->share([
	            'currentPage' => $this->navigation
	        ]);

            return $next($request);
        });
    }

    public function getTable($columns, $url, $view = 'table', $pageTitle = null, $parentTable = null)
    {
        $admin = $this->admin;
        $pageTitle = ($pageTitle)?:ucwords(str_replace('-', ' ', $this->page));
        $datatableColumns = [];

        foreach ($columns as $column) {
            $split = explode('.', $column);

            $data = (reset($split) == $parentTable) ? end($split) : reset($split);

            $datatableColumns[] = [
                'data' => $data,
                'name' => $column
            ];
        }

        $datatableColumns[] = ['data' => 'action', 'name' => 'action', 'orderable' => false, 'searchable' => false];

        $actionButtons = crud_check($admin);

        return view('admin-view::default.' . $view, compact('datatableColumns', 'url', 'pageTitle', 'actionButtons'));
    }

    public function getForm($query, $formAttr, $data = [])
    {
        $url = (isset($formAttr['url'])) ? $formAttr['url'] : '#';
        $view = (isset($formAttr['view'])) ? $formAttr['view'] : 'form';
        $method = (isset($formAttr['method'])) ? $formAttr['method'] : 'post';
        $pageTitle = (isset($formAttr['pageTitle'])) ? $formAttr['pageTitle'] : $this->page;
        $fields = (isset($formAttr['fields'])) ? $formAttr['fields'] : null;

        return view('admin-view::default.' . $view, compact('query', 'url', 'pageTitle', 'method', 'fields', 'data'));
    }
}
