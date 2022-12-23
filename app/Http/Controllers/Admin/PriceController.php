<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class PriceController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PriceController extends Controller
{
    public function index()
    {
        $data = $this->ListPrice();
        return view('admin.price', [
            'title' => 'Price',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Price' => false,
            ],
            'page' => 'resources/views/admin/price.blade.php',
            'controller' => 'app/Http/Controllers/Admin/PriceController.php',
            'data'  => $data['data']
        ]);
    }


    public function ListPrice(){
        $data = Http::get('http://host.docker.internal:7103/api/list-prices');
        return $data;
    }

    public function EditPrice(Request $request){
        $data = Http::post('http://host.docker.internal:7103/api/edit-prices', [
            'id'            => $request->id,
            'min_weight'    => $request->min_weight,
            'min_price'     => $request->min_price,
            'distance'      => $request->distance,
            'medium_weight' => $request->medium_weight,
            'medium_price'  => $request->medium_price,
            'max_weight'    => $request->max_weight,
            'max_price'     => $request->max_price
        ]);

        if($data['data'] == 1){
            return back(); 
        }
    }

    public function Negotiation(){
        $response = Http::get('http://host.docker.internal:7103/api/get-nogotiations');
        $data = $response->json();
        return view('admin.negotiate-ignition', [
            'data'  => $data['data']
        ]);
    }

    public function checkUsername(Request $request){
        $response = Http::post('http://host.docker.internal:7108/api/user/detail', [
            'uuid'    => $request->uuid
        ]);
        $semidata = $response->json();
        return view('admin.clientdetail', [
            'user'      => $semidata['user'],
            'profile'   => $semidata['profile'],
            'wallet'    => $semidata['wallet'] 
        ]);
    }

    public function AdjustPrice(Request $request){
        Http::post('http://host.docker.internal:7103/api/adjust-price', [
            'uuid'              => $request->uuid,
            'itemId'            => $request->itemId,
            'negotiated_price'  => $request->negotiated_price 
        ]);

        return back();
    }
}
