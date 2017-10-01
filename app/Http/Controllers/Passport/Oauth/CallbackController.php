<?php

namespace App\Http\Controllers\Passport\Oauth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

class CallbackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
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
            session('status', 'アプリケーションから認可が拒否されました。');
            return redirect()->route('passport');
        }

        /**
         * 認証コードが返されたら、OAuthサーバの認証コードテーブルとOAuthクライアントテーブルから
         * client_id, client_secret, redirect_uriを取得して/oauth/tokenへpostする形か？
         */
        $response = $http->post(url('oauth/token'), [                         // 申請先アプリへのアクセストークンリクエスト先URL
            'form_params'       => [
                'grant_type'    => 'authorization_code',                      // グラント種別：コード認証
                'client_id'     => 3,                                         // 申請先アプリ内で登録済みのクライアントID
                'client_secret' => '1mTJGc0tIcRzwCEuAuH8JBL8xLvfGlwBn4ipQzj9',// 申請先アプリ内で登録済みのクライアントシークレット
                'redirect_uri'  => route('passport.oauth.callback'),          // 申請先アプリ内で登録済みの利用側アプリのコールバックURL
                'code'          => $request->code,                            // コールバック時に受け取る認証コード
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

}
