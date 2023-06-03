<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifikasi;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notifikasi');
    }
    public function readNotification(Request $req)
    {
        $notificationID = $req->input('inputNotificationID');
        $notificationRedirectLink = $req->input('inputNotificationRedirectLink');

        Notifikasi::where('notifikasi_id', $notificationID)->update(['notifikasi_read' => 1]);
        return redirect(url($notificationRedirectLink));
    }
    public function clearNotifications()
    {
        Notifikasi::where('notifikasi_own', Auth::user()->username)->update(['notifikasi_read' => 1]);
        return redirect()->back();
    }
}