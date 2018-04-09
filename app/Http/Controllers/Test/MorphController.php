<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Post;
use App\Model\Test;
use App\Model\User;
use App\Model\Video;
use Illuminate\Http\Request;

class MorphController extends Controller
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
        /** @var User $user */
        $user = auth()->user();

        /**
         * post投稿
         */
        $this->createPost($user);

        /**
         * video投稿
         */
        $this->createVideo($user);

        /**
         * 検証
         */
//         dd($user->videos);
//         dd($user->posts);
//         dd($user->comments);
    }

    /**
     * @param  User $user
     * @return void
     */
    private function createPost(User $user)
    {
        if (! $user->posts) {
//             $user->posts()->save($model);//単体
            $user->posts()->saveMany([//複数
                factory(Post::class)->make(),
//                 new Comment([
//                     'title'   => 'Test title!',
//                     'content' => 'Test content!',
//                 ]),
            ]);
        } else foreach ($user->posts as $post) {
//             dd($post->comments);

            $post->comments()->saveMany([//複数
                tap($comment = factory(Comment::class)->make(), function($comment) use ($user){
                    return $comment->user_id = $user->id;// コメント筆者は別のリレーションなので、個別で必要
                }),
//                 new Comment([
//                     'content' => 'Test content!',
//                 ]),
            ]);

//             dd($post->comments);
        }
    }

    /**
     * @param  User $user
     * @return void
     */
    private function createVideo(User $user)
    {
        if (! $user->videos) {
//             $user->videos()->save($model);//単体
            $user->videos()->saveMany([//複数
                factory(Video::class)->make(),
//                 new Comment([
//                     'title'   => 'Test title!',
//                     'url'   => 'Http://test.com/test.jpg',
//                 ]),
            ]);
        } else foreach ($user->videos as $video) {
//             dd($video->comments);

            $video->comments()->saveMany([//複数
                tap($comment = factory(Comment::class)->make(), function($comment) use ($user){
                    return $comment->user_id = $user->id;// コメント筆者は別のリレーションなので、個別で必要
                }),
//                 new Comment([
//                     'content' => 'Test content!',
//                 ]),
                ]);

//             dd($video->comments);
        }
    }

}
