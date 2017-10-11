<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'role'       => $this->when(!$request->user()->isStoreUser(), $this->role),
            'email'      => $this->email,
            $this->mergeWhen($request->user()->isMaster(), [
                'password'       => $this->password,
                'remember_token' => $this->remember_token,
            ]),
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'deleted_at' => $this->deleted_at ? $this->deleted_at->toIso8601String() : null,
        ];
    }
}
