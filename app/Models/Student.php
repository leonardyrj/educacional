<?php

namespace SON\Models;
use Illuminate\Database\Eloquent\Model;
use SON\Traits\MorphUserTrait;


class Student extends Model
{
    use MorphUserTrait;
}
