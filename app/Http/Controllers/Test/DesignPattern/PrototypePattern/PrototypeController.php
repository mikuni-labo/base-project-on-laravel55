<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\PrototypePattern;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Test\DesignPattern\PrototypePattern\Concretes\{DeepCopyMenu, ShallowCopyMenu};
use App\Http\Controllers\Test\DesignPattern\PrototypePattern\MenuPrototype;
use Illuminate\Http\Request;

class PrototypeController extends Controller
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
        // メニューマネージャーのインスタンス化
        $manager = new MenuManager;

        // ディープコピーインスタンス
        $menu = new DeepCopyMenu('P001', 'ボロネーゼ', 1350, 'pasta');
        $comments = new \stdClass;
        $comments->comment[] = [
            'date' => '2018-06-23',
            'comment' => 'イタリアのトマトたっぷり。'
        ];
        $comments->comment[] = [
            'date' => '2018-06-25',
            'comment' => '大盛無料です。'
        ];
        $menu->setComments($comments);
        $manager->register($menu);

        // シャローコピーインスタンス
        $menu = new ShallowCopyMenu('P002', 'ナポリタン', 1100, 'pasta');
        $comments = new \stdClass;
        $comments->comment[] = [
            'date' => '2018-06-23',
            'comment' => '昔なつかしい味に仕上げました。'
        ];
        $comments->comment[] = [
            'date' => '2018-06-25',
            'comment' => '大盛無料です'
        ];
        $menu->setComments($comments);
        $manager->register($menu);


        // メニューコードを指定してオリジナルとコピーのインスタンスを作成＆表示
        $this->executeCopy($manager, 'P001');
        $this->executeCopy($manager, 'P002');
    }

    private function executeCopy(MenuManager $manager, $menu_code)
    {
        // インスタンス生成
        $menu1 = $manager->create($menu_code);  // オリジナル
        $menu2 = $manager->create($menu_code);  // コピー

        // オリジナルのコメントを変更
        $menu1->cngComment(1, [ 'date' => '2018-06-27', 'comment' => '大盛サービスは終了しました。']);

        // 結果表示
        echo '<h2>オリジナル</h2>';
        echo $menu1->display();
        echo '<h2>コピー</h2>';
        echo $menu2->display();
        echo '<hr>';
    }

}
