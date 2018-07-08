<?php
declare(strict_types=1);

namespace Domain\UseCases;

use Domain\Traits\Transactional;

class GetUser
{
    use Transactional;

    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *
     */
    public function excute()
    {
        return $this->transaction(function () {
            try {
                auth()->user()->update(['name' => '管理者1']);
                return 'ok';
            } catch (\Exception $e) {
                return $e;
            }
        });

    }

}
