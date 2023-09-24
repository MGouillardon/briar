<?php

namespace App\Http\Controllers\Notification;

use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class NotificationController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia(
            'Notification/Index',
            [
                'notifications' => $request->user()->notifications()->paginate(10)
            ]
        );
    }

}
