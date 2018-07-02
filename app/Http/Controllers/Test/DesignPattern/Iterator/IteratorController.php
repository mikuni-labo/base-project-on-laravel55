<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test\DesignPattern\Iterator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IteratorController extends Controller
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
//         $users = ["name 01", "name 02", "name 03", "name 04", "name 05"];
//         $list = new RosterClient(new UsersAggregate($users));

//         echo $list->getUsers();
    }

}

// /**
//  * Aggregate Interface
//  * Interface UsersAggregate
//  */
// interface UsersAggregateInterface
// {
//     public function createIterator();
// }

// /**
//  * Iterator Interface
//  * Interface UserListIterator
//  */
// interface UserListIteratorInterface
// {
//     public function hasNext();
//     public function next();
// }

// /**
//  * Iterator Class
//  * Class UserListIterator
//  */
// class UserListIterator implements UserListIteratorInterface
// {
//     private $users;
//     private $position = 0;

//     function __construct(array $users = [])
//     {
//         $this->users = $users;
//     }

//     /**
//      * {@inheritDoc}
//      * @see \App\Http\Controllers\Test\DesignPattern\UserListIteratorInterface::hasNext()
//      */
//     public function hasNext(): bool
//     {
//         return isset($this->users[$this->position]);
//     }

//     /**
//      * {@inheritDoc}
//      * @see \App\Http\Controllers\Test\DesignPattern\UserListIteratorInterface::next()
//      */
//     public function next()
//     {
//         return $this->users[$this->position++];
//     }
// }

// /**
//  * 集約オブジェクト
//  * Aggregate Class
//  * Class UsersAggregate
//  */
// class UsersAggregate implements UsersAggregateInterface
// {
//     private $userList;

//     function __construct(array $users = [])
//     {
//         $this->userList = $users;
//     }

//     public function addUsersList($user)
//     {
//         $this->userList[] = $user;
//     }

//     public function getUserList(): array
//     {
//         return $this->userList;
//     }

//     /**
//      * {@inheritDoc}
//      * @see \App\Http\Controllers\Test\DesignPattern\UsersAggregateInterface::createIterator()
//      */
//     public function createIterator()
//     {
//         return new UserListIterator($this->userList);
//     }
// }

// /**
//  * クライアント（名簿）
//  * Client Class
//  * Class RosterClient
//  */
// class RosterClient
// {
//     private $userIterator;

//     function __construct(UsersAggregateInterface $user_list)
//     {
//         $this->userIterator = $user_list->createIterator();
//     }

//     function getUsers()
//     {
//         while ($this->userIterator->hasNext()) {
//             $user = $this->userIterator->next();
//             dump(sprintf("%s", $user));
//         }
//     }
// }
