<?php
/**
 * Created by PhpStorm.
 * User: leonardy
 * Date: 25/01/2018
 * Time: 11:13
 */
namespace SON\Traits;

trait MorphUserTrait
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->morphOne(User::class,'userable');
    }
}