<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrcodeController extends Controller
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
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $url = route('home');

//         print_r( \QrCode::size(100)->generate($url) );exit;

        print_r( \QrCode::size(200)->wifi([
            'encryption' => 'WPA/WEP',
            'ssid' => 'Your SSID',
            'password' => 'Your Password',
            'hidden' => 'Whether the network is a hidden SSID or not.'
        ]) );exit;
    }

}
