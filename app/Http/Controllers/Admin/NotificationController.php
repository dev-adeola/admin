<?php

namespace App\Http\Controllers\Admin;

use App\Models\NotifyDB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

/**
 * Class NotificationController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NotificationController extends Controller
{
    public function index()
    {
        $data = $this->fetchNotifications();
        return view('admin.notification', [
            'title' => 'Notification',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Notification' => false,
            ],
            'page' => 'resources/views/admin/notification.blade.php',
            'controller' => 'app/Http/Controllers/Admin/NotificationController.php',
            'data'  => $data
        ]);
    }

    public function fetchNotifications(){
        $data = NotifyDB::all()->take(3);
        return $data;
    }

    public function Notify(Request $request){
        $case   = $request->category;
        $message = $this->MessageFormatter($request->subject, $request->date, $request->message, $request->importance );
        $this->saveNotificatiion($request->subject, $request->message, $case);
        $this->dispatchMessage($case, null, $message);
        return back();
    }

    public function MessageFormatter($subject, $date, $message, $importance){
        return [
            'subject'       => $subject,
            'date'          => $date,
            'message'       => $message,
            'importance'    => $importance
        ];
    }

    public function dispatchMessage($case, $uuid = null, $message){

        switch($case) {
            case 'users': 
                Http::post('http://host.docker.internal:7108/api/user/notify-users', [
                    'uuid'      => null,
                    'message'   => $message
                ]);
                break;
            case 'single-user':
                Http::post('http://host.docker.internal:7108/api/user/notify-single-user', [
                    'uuid'      => $uuid,
                    'message'   => $message
                ]);
                break;
            case 'zoommers':
                Http::post('http://host.docker.internal:7109/api/user/notify-zoommers', [
                    'uuid'      => null,
                    'message'   => $message
                ]);
                break;
            case 'single-zoommer':
                Http::post('http://host.docker.internal:7109/api/user/notify-single-zoommer', [
                    'uuid'      => $uuid,
                    'message'   => $message
                ]);
                break;
            case 'collections':
                Http::post('http://host.docker.internal:7109/api/user/notify-collectors', [
                    'uuid'      => null,
                    'message'   => $message
                ]);
                break;
            case 'single-collection':
                Http::post('http://host.docker.internal:7109/api/user/notify-single-collector', [
                    'uuid'      => $uuid,
                    'message'   => $message
                ]);
                break;
            default:
                return 'You have not selected any channel for brodcasting';
        }
    }


    public function saveNotificatiion($subject, $message, $case){
        NotifyDB::create([
            'subject'   => $subject,
            'message'   => $message,
            'category'  => $case
        ]);
    }
}
