<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayStackAccount;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class AccountController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AccountController extends Controller
{
    public function index()
    {
        $rawBalance = $this->RawViewBalance();
        $dataSet = $this->CountUsers();
        $transactions = $this->getTransaction();
        return view('admin.account', [
            'title' => 'Account',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Account' => false,
            ],
            'page' => 'resources/views/admin/account.blade.php',
            'controller' => 'app/Http/Controllers/Admin/AccountController.php',
            'balance'   => $rawBalance,
            'dataSet'   => $dataSet,
            'trans'     => $transactions
        ]);
    }

    public function RawViewBalance(){
        return PayStackAccount::first();
        
    }

    public function CountUsers(){
        $response = Http::get('http://host.docker.internal:7108/api/user');
        $data = Http::get('http://host.docker.internal:7109/api/user');

        $dataSet = [
            'users'     => count($response['data']),
            'zoommers'  => count($data['data'])
        ];

        return $dataSet;
    }

    public function getTransaction(){
        // to return data
       $data =  Http::get('http://host.docker.internal:7106/api/transactions');
        return $data['data'];
    }
}
