<?php

namespace SON\Models;

use Illuminate\Database\Eloquent\Model;
use SON\Traits\MorphUserTrait;

class Admin extends Model
{
    use MorphUserTrait;
}
