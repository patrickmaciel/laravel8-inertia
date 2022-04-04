<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class BaseResource extends JsonResource
{
    public function somente(...$attributes)
    {
        return Arr::only($this->resolve(), $attributes);
        // return collect($this->resolve())
        //     ->only($attributes)
        //     ->toArray();
    }
}
