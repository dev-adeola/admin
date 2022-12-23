<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class ZoommersController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ZoommersController extends Controller
{
    public function index()
    {
        $data = $this->getZoommersList();
        // dd($data);
        return view('admin.zoommers', [
            'title' => 'Zoommers',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Zoommers' => false,
            ],
            'page' => 'resources/views/admin/zoommers.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ZoommersController.php',
            'data'  => $data['data']
        ]);
    }


    public function getZoommersList()
    {
        $response = Http::get('http://host.docker.internal:7109/api/user');
        return $response->json();
    }

    public function activateZoommers(Request $request)
    {
        $response = Http::post('http://host.docker.internal:7109/api/user/activate', [
            'uuid'    => $request->uuid
        ]);
        // dd($response);
        return back();
    }

    public function blockZoommers(Request $request)
    {
        // dd($request->uuid);
        $response = Http::post('http://host.docker.internal:7109/api/user/block', [
            'uuid'    => $request->uuid
        ]);

        return back();
    }

    public function unblockZoommers(Request $request)
    {
        // dd($request->uuid);
        $response = Http::post('http://host.docker.internal:7109/api/user/unblock', [
            'uuid'    => $request->uuid
        ]);
        
        return back();
    }


    public function ZoommersDetails(Request $request)
    {
        $response = Http::post('http://host.docker.internal:7109/api/user/detail', [
            'uuid'    => $request->uuid
        ]);

        $data = $response->json();
        return view('admin.zoommerdetail', [
            'user'          => $data['user'],
            'profile'       => $data['profile'],
            'account'       => $data['account'] 
        ]);
    }
}
