<?php

namespace App\Http\Controllers\Passport\Oauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

class TestController extends Controller
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
     * OAuth authorization test.
     *
     * @method GET
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $query = http_build_query([
            'client_id'     => 3,                               // 申請先アプリ内で登録済みのクライアントID
            'redirect_uri'  => route('passport.oauth.callback'),// 利用側アプリのコールバックURL（申請先アプリ内で登録済みであることが条件）
            'response_type' => 'code',                          // 認証コードをリクエスト
            'scope'         => 'user-get user-get-all',         // 必要なスコープをリクエスト（複数の場合は半角スペース区切り）
        ]);

        return redirect(url('oauth/authorize') .'?'. $query); // 申請先アプリへGETでリクエストを送信 → この後、申請先アプリ内の認可・拒否フォームが表示される
    }

}
