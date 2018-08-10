<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Domain\UseCases\GetUser;
use Illuminate\Http\Request;

class DomainDrivenDesignController extends Controller
{
    /** @var GetUser */
    private $useCase;

    /**
     * @param  GetUser $useCase
     * @return void
     */
    public function __construct(GetUser $useCase)
    {
        $this->middleware('auth');
        $this->useCase = $useCase;
    }

    /**
     * @param  Request $request
     */
    public function __invoke(Request $request)
    {
        dump($this->useCase->excute());
    }

}
