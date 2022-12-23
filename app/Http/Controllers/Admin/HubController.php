<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class HubController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HubController extends Controller
{
    public function index()
    {
        $data = $this->ListHubServices();
        
        return view('admin.hub', [
            'title' => 'Hub',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Hub' => false,
            ],
            'page' => 'resources/views/admin/hub.blade.php',
            'controller' => 'app/Http/Controllers/Admin/HubController.php',
            'data'  => $data['data']
        ]);
    }

    public function ListHubServices(){
        $data = Http::get('http://host.docker.internal:7106/api/list-hub-services');
        return $data;
    }
}
