<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\{Comment, Post, Tag, User, Video};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
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
        /** @var Builder $query */
        $query = Post::query()
            ->select([
                'posts.*',
                \DB::raw('max(comments.updated_at) as c_max'),
            ])
            ->leftJoin('comments', function(JoinClause $join) {
                $join->on('posts.id', '=', 'comments.commentable_id');
            })
            ->where('posts.user_id', auth()->user()->id)
            ->where('comments.commentable_type', 'post')
            ->whereNull('comments.deleted_at')
            ->groupBy('comments.commentable_id')
            ->latest('c_max');

//         dd( $query->toSql() );

        dd( $query->get()->toArray() );
    }

}
