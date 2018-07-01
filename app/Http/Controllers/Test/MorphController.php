<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Post;
use App\Model\Tag;
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
         * post,comment投稿
         */
        $this->testPosts($user);

        /**
         * video,comment投稿
         */
        $this->testVideos($user);

        /**
         * tag作成・付与
         */
        $this->testTags();

        /**
         * 検証
         */
//         dd($user->videos);
//         dd($user->posts);
//         dd($user->comments);

        dd('end');
    }

    /**
     * @param  User $user
     * @return void
     */
    private function testPosts(User $user)
    {
        if ($user->posts->isEmpty()) {
//             $user->posts()->save($model);//単体
            $user->posts()->saveMany([//複数
                factory(Post::class)->make(),
//                 new Post([
//                     'title'   => 'Test title!',
//                     'content' => 'Test content!',
//                 ]),
            ]);
        } else foreach ($user->posts as $post) {
            /**
             * comment
             */
            $post->comments()->saveMany([//複数
                factory(Comment::class)->make([
                    'user_id' => $user->id,// コメント筆者は別のリレーションなので、個別で必要
                ]),
//                 new Comment([
//                     'content' => 'Test content!',
//                 ]),
            ]);
        }
    }

    /**
     * @param  User $user
     * @return void
     */
    private function testVideos(User $user)
    {
        if ($user->videos->isEmpty()) {
//             $user->videos()->save($model);//単体
            $user->videos()->saveMany([//複数
                factory(Video::class)->make(),
//                 new Video([
//                     'title'   => 'Test title!',
//                     'url'   => 'Http://test.com/test.jpg',
//                 ]),
            ]);
        } else foreach ($user->videos as $video) {
            /**
             * comment
             */
            $video->comments()->saveMany([//複数
                factory(Comment::class)->make([
                    'user_id' => $user->id,// コメント筆者は別のリレーションなので、個別で必要
                ]),
//                 new Comment([
//                     'content' => 'Test content!',
//                 ]),
            ]);
        }
    }

    /**
     * @return void
     */
    private function testTags()
    {
//         factory(Tag::class, 3)->create();
//         return ;

        $post1 = Post::find(1);
        $post2 = Post::find(2);

        $video1 = Video::find(1);
        $video2 = Video::find(2);

        $tag1  = Tag::find(1);
        $tag2  = Tag::find(2);

        /**
         * syncメソッド最高！！
         */
        $post1->tags()->sync([
            $tag1->id,
            $tag2->id,
        ]);

        $video1->tags()->sync([
            $tag1->id,
            $tag2->id,
        ]);

        /**
         * 存在しているIDを削除したくない場合は、syncWithoutDetachingメソッドを使用することも可能
         */
        $video1->tags()->syncWithoutDetaching([
            $tag1->id,
//             $tag2->id,
        ]);
    }

}
