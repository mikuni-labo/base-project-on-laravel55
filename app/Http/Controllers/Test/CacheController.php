<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param  Request $request
     */
    public function __invoke(Request $request)
    {
        foreach ($this->getPosts() as $post) {
            dump( $post->comments );
        }
    }

    private function getPosts()
    {
        return \Cache::remember('posts', 1, function () {
            dump('キャッシングされました');
            return auth()->user()->posts()->with(['comments'])->get();
        });
    }

}
