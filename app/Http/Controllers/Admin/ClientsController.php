<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class ClientsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientsController extends Controller
{
    public function index()
    {
    
        $data = $this->getClientList();
        return view('admin.clients', [
            'title' => 'Clients',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Clients' => false,
            ],
            'page' => 'resources/views/admin/clients.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ClientsController.php',
            'data'  => $data['data']
        ]);
    }


    public function getClientList()
    {
        $response = Http::get('http://host.docker.internal:7108/api/user');
        return $response->json();
    }

    public function activateClient(Request $request)
    {
        $response = Http::post('http://host.docker.internal:7108/api/user/activate', [
            'uuid'    => $request->uuid
        ]);

        return back();
    }

    public function blockClient(Request $request)
    {
        $response = Http::post('http://host.docker.internal:7108/api/user/block', [
            'uuid'    => $request->uuid
        ]);

        return back();
    }

    public function unblockClient(Request $request)
    {
        $response = Http::post('http://host.docker.internal:7108/api/user/unblock', [
            'uuid'    => $request->uuid
        ]);
        
        return back();
    }


    public function clientDetails(Request $request)
    {
        $response = Http::post('http://host.docker.internal:7108/api/user/detail', [
            'uuid'    => $request->uuid
        ]);

        $data = $response->json();
        return view('admin.clientdetail', [
            'user'      => $data['user'],
            'profile'   => $data['profile'],
            'wallet'    => $data['wallet'] 
        ]);
    }
}