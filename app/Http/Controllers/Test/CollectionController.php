<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CollectionController extends Controller
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
     * Any test.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        /** @var Collection $collection */
        $collection = collect([1, 2, 3, 4, 5]);

        $result = $collection->filter(function (int $item, int $key) {
            return $item > 3;
        });
//         dd( $result->values()->all() );// [4,5]

        $result = $collection->reject(function (int $item, int $key) {
            return $item > 3;
        });
//         dd( $result->values()->all() );// [1,2,3]

        // filter()は真の物を残す
        // reject()は真のものを排除する
        // どちらも元のコレクションに変動無し


        $array = [2,10,4,15];
        foreach ($array as $value) {
            $collection = $collection->when($collection->contains($value), function (Collection $collection) use ($value) {
                return $collection->reject($value);
            }, function (Collection $collection) use ($value) {
                return $collection->push($value);
            });
        }
        dd( $collection->values()->all() );// [1,3,5,10,15]

    }
}
