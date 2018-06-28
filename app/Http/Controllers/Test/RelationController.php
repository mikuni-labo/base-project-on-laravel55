<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\{Comment, Post, Tag, User, Video};
use Illuminate\Http\Request;

class RelationController extends Controller
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
        $query = Post::query();
        $query->select([
            'posts.*',
            'comments.updated_at as c_max_updated_at',
        ]);

        $query->leftJoin('comments', function($join) {
            $join->on('posts.id', '=', 'comments.commentable_id');
        });

        $query->where('posts.user_id', auth()->user()->id);
        $query->where('comments.commentable_type', 'post');

        $query->whereIn('comments.updated_at', function($q) {
            $q->select( \DB::raw('
                c_max_updated_at FROM (
                    SELECT MAX(t1.`updated_at`) AS c_max_updated_at
                    FROM `comments` AS t1
                    GROUP BY t1.`commentable_id`
                ) AS t2
            '));
        });

        $query->latest('c_max_updated_at');

        $res = $query->get();

//
        dd( $res->toArray() );
    }

}
