<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotificationController extends Controller
{

    public function readNotification(Request $req)
    {
        $notificationID = $req->input('inputNotificationID');
        $notificationRedirectLink = $req->input('inputNotificationRedirectLink');

        Notifikasi::where('notifikasi_id', $notificationID)->update(['notifikasi_read' => 1]);
        // return url($notificationRedirectLink);
        return redirect(url($notificationRedirectLink));
    }
}