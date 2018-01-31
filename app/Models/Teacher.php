<?php

namespace SON\Models;

use Illuminate\Database\Eloquent\Model;
use SON\Traits\MorphUserTrait;

class Teacher extends Model
{
    use MorphUserTrait;
}
