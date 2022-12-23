<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class CourierController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourierController extends Controller
{
    public function index()
    {
        $data = $this->ListCurrierServices();
        return view('admin.courier', [
            'title' => 'Courier',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Courier' => false,
            ],
            'page' => 'resources/views/admin/courier.blade.php',
            'controller' => 'app/Http/Controllers/Admin/CourierController.php',
            'data'  => $data['data']
        ]);
    }

    public function ListCurrierServices(){
        $data = Http::get('http://host.docker.internal:7106/api/list-currier-services');
        return $data;
    }
}
