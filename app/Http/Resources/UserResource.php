<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $canSeeEmail = Auth::user()->can('manageEmails', User::class);

        // Auth:user()->is($this->resource) == if the resource is the currently logged user
        return [
            'id' => $this->id,
            // 'email' => $this->when($canSeeEmail, $this->email),
            'email' => $this->when(Auth::user()->is($this->resource), $this->email),
            'name' => $this->name,
            'can' => [
                'edit' => Auth::user()->can('edit', $this->resource),
            ],
            $this->mergeWhen($canSeeEmail, [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]),
        ];
    }
}
