<?php

namespace App\Http\Controllers\Test;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Render mailable test.
     *
     * @param Request $request
     * @param TestNotification $notification
     * @return
     */
    public function __invoke(Request $request, TestNotification $notification)
    {
        /**
         * メソッドテスト
         */
//         dd(auth()->user()->notifications);//通知コレクション（未読・既読混合）
//         dd(auth()->user()->unreadNotifications);//未読一覧
//         dd(auth()->user()->readNotifications);//既読一覧

//         foreach (auth()->user()->unreadNotifications as $n) {
//             $n->markAsRead();// 既読へ
//             $n->markAsUnread();// 未読へ
//             $n->delete();//削除
//         }

//         dd('end');

        event(new TestEvent($notification));

        \Flash::success('イベント発火');

        dd('発火!');

        return redirect()->route('home');
    }

}
