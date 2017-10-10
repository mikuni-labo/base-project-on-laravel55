<?php

namespace App\Http\Controllers\Test;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        event(new TestEvent($notification));

        \Flash::success('イベント発火');

        return redirect()->route('home');
    }

}
