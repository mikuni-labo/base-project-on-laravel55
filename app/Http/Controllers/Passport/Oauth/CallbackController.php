<?php

namespace App\Http\Controllers\Passport\Oauth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @method GET
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $http = new Client;

        if( ! $request->has('code') ) {
            \Flash::info('アプリケーションから認可が拒否されました。');
            return response()->json($request->all(), 403);
        }

        /**
         * 認証コードが返されたら、OAuthサーバの認証コードテーブルとOAuthクライアントテーブルから
         * client_id, client_secret, redirect_uriを取得して/oauth/tokenへpostする形か？
         */
        $response = $http->post(url('oauth/token'), [                         // 申請先アプリへのアクセストークンリクエスト先URL
            'form_params' => [
                'grant_type'    => 'authorization_code',                      // グラント種別：コード認証
                'client_id'     => 3,                                         // 申請先アプリ内で登録済みのクライアントID
                'client_secret' => 'dxNiv74REm50bWLGyvKLrwbOLfy0mG6KAgzPJ7s8',// 申請先アプリ内で登録済みのクライアントシークレット
                'redirect_uri'  => route('passport.oauth.callback'),          // 申請先アプリ内で登録済みの利用側アプリのコールバックURL
                'code'          => $request->code,                            // コールバック時に受け取る認証コード
            ],
//             'proxy' => [
//                 'http' => 'tcp://172.18.0.3:8000',
//             ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

}
