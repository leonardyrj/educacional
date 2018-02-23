<?php

namespace SON\Models;

use Illuminate\Database\Eloquent\Model;
use SON\Traits\MorphUserTrait;

class Teacher extends Model
{
    use MorphUserTrait;

    public function toArray()
    {
        $data = parent::toArray();
        $this->user->makeHidden('userable_type', 'userable_id');
        $data['user'] = $this->user;
        return $data;
    }
}
